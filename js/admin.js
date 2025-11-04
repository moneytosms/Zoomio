// Small admin utilities
function confirmAction(message) {
  return confirm(message || "Are you sure you want to continue?");
}

// Simple helper to delegate confirmation from anchors using data-confirm
document.addEventListener("click", function (e) {
  const el = e.target.closest("[data-confirm]");
  if (!el) return;
  const msg = el.getAttribute("data-confirm") || "Are you sure?";
  if (!confirmAction(msg)) {
    e.preventDefault();
    return false;
  }
});
