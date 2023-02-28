
// chọn tất cả checkbox
let checkboxes = document.querySelectorAll('input[data="1"]');
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

// check box 2

let checkboxes_2 = document.querySelectorAll('input[data="2"]');
let allCheckbox_2 = document.getElementById('all-checkbox-2');

allCheckbox_2.addEventListener('change', () => {

  checkboxes_2.forEach(element => {
    element.checked = allCheckbox_2.checked;
  });
});

checkboxes_2.forEach(element => {
  element.addEventListener('change', () => {

    // trường hợp 1 checkbox bỏ check -> xóa checked tại all-checkbox
    if (allCheckbox_2.checked && !element.checked) {
      allCheckbox_2.checked = false;
    }

    // trường hợp tất cả checkbox đc check -> checked tại all-checkbox
    let isChecked = true;
    for (let index = 0; index < checkboxes_2.length; index++) {
      if (index == 0) continue;

      if (!checkboxes_2[index].checked) {
        isChecked = false;
        break;
      }
    }
    allCheckbox_2.checked = isChecked;

  });
});