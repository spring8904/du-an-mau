const checkboxes = document.querySelectorAll(
  'input[type="checkbox"]:not([name="select-all"])',
)
const inputSelectAll = document.querySelector('input[name="select-all"]')

const selectAll = () => {
  inputSelectAll.checked = true
  checkboxes.forEach((checkbox) => {
    checkbox.checked = true
  })
}

const deselectAll = () => {
  inputSelectAll.checked = false
  checkboxes.forEach((checkbox) => {
    checkbox.checked = false
  })
}

if (checkboxes && inputSelectAll) {
  inputSelectAll.onchange = () => {
    checkboxes.forEach((checkbox) => {
      checkbox.checked = inputSelectAll.checked
    })
  }

  checkboxes.forEach((checkbox) => {
    checkbox.onchange = () => {
      inputSelectAll.checked = [...checkboxes].every(
        (checkbox) => checkbox.checked,
      )
    }
  })
}
