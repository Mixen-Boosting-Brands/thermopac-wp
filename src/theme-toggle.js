function getPreferredTheme() {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) return savedTheme;
  return window.matchMedia("(prefers-color-scheme: dark)").matches
    ? "dark"
    : "light";
}

function setTheme(theme) {
  const html = document.getElementById("html-root");
  html.setAttribute("data-bs-theme", theme);
  localStorage.setItem("theme", theme);
  updateLogosForTheme(theme);
  updateThemeIcon(theme);
}

function updateLogosForTheme(theme) {
  const logos = document.querySelectorAll(".logo");
  logos.forEach((logo) => {
    const newSrc =
      logo.dataset[`theme${theme.charAt(0).toUpperCase() + theme.slice(1)}`];
    if (newSrc) logo.src = newSrc;
  });
}

function updateThemeIcon(theme) {
  const icon = document.querySelector("#theme-toggle i");
  if (!icon) return;

  if (theme === "dark") {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  } else {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const html = document.getElementById("html-root");
  const toggleBtn = document.getElementById("theme-toggle");

  const initialTheme = getPreferredTheme();
  setTheme(initialTheme);

  if (toggleBtn) {
    toggleBtn.addEventListener("click", () => {
      const currentTheme = html.getAttribute("data-bs-theme");
      const newTheme = currentTheme === "dark" ? "light" : "dark";
      console.log(`Switched to: ${newTheme}`);
      setTheme(newTheme);
    });
  }
});
