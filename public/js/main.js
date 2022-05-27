let sidebarToggle = document.querySelector(".sidebarToggle");
sidebarToggle.addEventListener("click", function () {
  document.querySelector("body").classList.toggle("active");
  document.getElementById("sidebarToggle").classList.toggle("active");
});

window.addEventListener("resize", function () {
  if (window.innerWidth < 768) {
    document.querySelector("body").classList.toggle("active");
    document.getElementById("sidebarToggle").classList.toggle("active");
  }
});

if (window.innerWidth < 768) {
  document.querySelector("body").classList.toggle("active");
  document.getElementById("sidebarToggle").classList.toggle("active");
}
