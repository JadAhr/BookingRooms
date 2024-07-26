
var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

function toggleDropdown() {
  const dropdown = document.getElementById('guest-dropdown');
  dropdown.classList.toggle('hidden');
}

function increment(type) {
  const countElement = document.getElementById(`${type}-count`);
  let count = parseInt(countElement.textContent);
  count++;
  countElement.textContent = count;
  document.getElementById(`${type}-input`).value = count;
  updateGuestSummary();
}

function decrement(type) {
  const countElement = document.getElementById(`${type}-count`);
  let count = parseInt(countElement.textContent);
  if (count > 0) {
      count--;
      countElement.textContent = count;
      document.getElementById(`${type}-input`).value = count;
      updateGuestSummary();
  }
}

function updateGuestSummary() {
  const adults = document.getElementById('adults-count').textContent;
  const children = document.getElementById('children-count').textContent;
  const rooms = document.getElementById('rooms-count').textContent;
  const summary = `${adults} adults · ${children} children · ${rooms} room${rooms > 1 ? 's' : ''}`;
  document.getElementById('guest-summary').textContent = summary;
}


