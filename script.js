const state = {
  data: null,
  filteredLessons: [],
  selectedLessonId: null,
  query: ""
};

const elements = {
  grid: document.getElementById("scheduleGrid"),
  searchInput: document.getElementById("searchInput"),
  todayList: document.getElementById("todayList"),
  changesList: document.getElementById("changesList"),
  legendList: document.getElementById("legendList"),
  statsLegend: document.getElementById("statsLegend"),
  statsDonut: document.getElementById("statsDonut"),
  editorEmpty: document.getElementById("editorEmpty"),
  lessonForm: document.getElementById("lessonForm"),
  clearSelection: document.getElementById("clearSelection"),
  subjectField: document.getElementById("subjectField"),
  teacherField: document.getElementById("teacherField"),
  roomField: document.getElementById("roomField"),
  dayField: document.getElementById("dayField"),
  timeField: document.getElementById("timeField")
};

const dayNames = {
  monday: "Pondeli",
  tuesday: "Utery",
  wednesday: "Streda",
  thursday: "Ctvrtek",
  friday: "Patek"
};

async function init() {
  const response = await fetch("schedule.php");
  const data = await response.json();

  state.data = data;
  state.filteredLessons = data.lessons;

  bindEvents();
  renderAll();
}

function bindEvents() {
  elements.searchInput.addEventListener("input", (event) => {
    state.query = event.target.value.trim().toLowerCase();
    filterLessons();
    renderSchedule();
  });

  elements.clearSelection.addEventListener("click", () => {
    state.selectedLessonId = null;
    updateEditor();
    renderSchedule();
  });
}

function filterLessons() {
  const query = state.query;

  if (!query) {
    state.filteredLessons = state.data.lessons;
    return;
  }

  state.filteredLessons = state.data.lessons.filter((lesson) => {
    const haystack = [
      lesson.subject,
      lesson.teacher,
      lesson.room,
      dayNames[lesson.day],
      lesson.time
    ].join(" ").toLowerCase();

    return haystack.includes(query);
  });
}

function renderAll() {
  renderSchedule();
  renderToday();
  renderChanges();
  renderLegend();
  renderStats();
  updateEditor();
}

function renderSchedule() {
  const { days, slots, lessons, categories } = state.data;
  const visibleIds = new Set(state.filteredLessons.map((lesson) => lesson.id));
  const grid = [];

  grid.push('<div class="grid-cell"></div>');
  days.forEach((day) => {
    grid.push(`<div class="day-cell">${day.label}</div>`);
  });

  slots.forEach((slot) => {
    grid.push(`<div class="time-cell">${slot.label}</div>`);

    days.forEach((day) => {
      const lesson = lessons.find((item) => item.day === day.id && item.slot === slot.id);

      if (!lesson) {
        grid.push('<div class="grid-cell"></div>');
        return;
      }

      if (lesson.type === "break") {
        grid.push('<div class="break-cell">Prestavka</div>');
        return;
      }

      const category = categories[lesson.category];
      const dimmed = state.query && !visibleIds.has(lesson.id) ? " dimmed" : "";
      const selected = state.selectedLessonId === lesson.id ? " selected" : "";

      grid.push(`
        <button
          class="lesson-card${dimmed}${selected}"
          type="button"
          data-id="${lesson.id}"
          style="--accent:${category.color}; --card-bg:${category.background};"
        >
          <p class="lesson-title">${lesson.subject}</p>
          <p class="lesson-meta">${lesson.room}<br>${lesson.teacher}</p>
        </button>
      `);
    });
  });

  elements.grid.innerHTML = grid.join("");

  elements.grid.querySelectorAll(".lesson-card").forEach((button) => {
    button.addEventListener("click", () => {
      state.selectedLessonId = button.dataset.id;
      updateEditor();
      renderSchedule();
    });
  });
}

function renderToday() {
  elements.todayList.innerHTML = state.data.today
    .map((lesson) => `<li>${lesson.time} - ${lesson.subject} (${lesson.room})</li>`)
    .join("");
}

function renderChanges() {
  elements.changesList.innerHTML = state.data.changes
    .map((change) => `
      <div class="change-item">
        <strong>${change.date}</strong>
        <span>${change.text}</span>
      </div>
    `)
    .join("");
}

function renderLegend() {
  elements.legendList.innerHTML = Object.values(state.data.categories)
    .map((category) => `
      <div class="legend-item">
        <span class="legend-label">
          <span class="dot" style="--dot-color:${category.color};"></span>
          ${category.label}
        </span>
      </div>
    `)
    .join("");
}

function renderStats() {
  const totals = {};

  state.data.lessons.forEach((lesson) => {
    if (lesson.type === "break") {
      return;
    }

    totals[lesson.category] = (totals[lesson.category] || 0) + 1;
  });

  const entries = Object.entries(totals);
  const totalLessons = entries.reduce((sum, [, value]) => sum + value, 0);
  let offset = 0;

  const gradient = entries
    .map(([key, value]) => {
      const start = (offset / totalLessons) * 100;
      offset += value;
      const end = (offset / totalLessons) * 100;
      return `${state.data.categories[key].color} ${start}% ${end}%`;
    })
    .join(", ");

  elements.statsDonut.style.background = `conic-gradient(${gradient})`;
  elements.statsLegend.innerHTML = entries
    .map(([key, value]) => `
      <div class="stat-row">
        <span class="stat-label">
          <span class="dot" style="--dot-color:${state.data.categories[key].color};"></span>
          ${state.data.categories[key].label}
        </span>
        <strong>${value}</strong>
      </div>
    `)
    .join("");
}

function updateEditor() {
  const lesson = state.data.lessons.find((item) => item.id === state.selectedLessonId);

  if (!lesson || lesson.type === "break") {
    elements.editorEmpty.classList.remove("hidden");
    elements.lessonForm.classList.add("hidden");
    return;
  }

  elements.editorEmpty.classList.add("hidden");
  elements.lessonForm.classList.remove("hidden");
  elements.subjectField.value = lesson.subject;
  elements.teacherField.value = lesson.teacher;
  elements.roomField.value = lesson.room;
  elements.dayField.value = dayNames[lesson.day];
  elements.timeField.value = lesson.time;
}

init().catch(() => {
  elements.grid.innerHTML = '<div class="grid-cell" style="grid-column:1 / -1; min-height:120px; display:grid; place-items:center;">Nepodarilo se nacist data z PHP souboru.</div>';
});
