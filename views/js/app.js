
// chọn tất cả checkbox
let checkboxes = document.querySelectorAll('input[type="checkbox"]');
let allCheckbox = document.getElementById('all-checkbox');

allCheckbox.addEventListener('change', () => {

  checkboxes.forEach(element => {
    element.checked = allCheckbox.checked;
  });
});

checkboxes.forEach(element => {
  element.addEventListener('change', () => {

    // trường hợp 1 checkbox bỏ check -> xóa checked tại all-checkbox
    if (allCheckbox.checked && !element.checked) {
      allCheckbox.checked = false;
    }

    // trường hợp tất cả checkbox đc check -> checked tại all-checkbox
    let isChecked = true;
    for (let index = 0; index < checkboxes.length; index++) {
      if (index == 0) continue;

      if (!checkboxes[index].checked) {
        isChecked = false;
        break;
      }
    }
    allCheckbox.checked = isChecked;

  });
});

// Quản lí slide
