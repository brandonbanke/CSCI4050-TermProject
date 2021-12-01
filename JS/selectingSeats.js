// var limit = 3;
// $('input.seat').on('change', function(evt) {
//    if($(this).siblings('not(:checked)').length >= limit) {
//        this.checked = false;
//    }
// });

function myFunc() {
    var counter = 0;
    var checkboxes = document.getElementsByName('seat');
    for (var checkbox of checkboxes)
    {
        if (checkbox.checked) {
            counter++;
        }
        if (counter >= 4) {
            for (let i = 0; i < 105; i++) {
                if (!checkboxes[i].checked) {
                    checkboxes[i].disabled = true;
                }
            }
        } else {
            checkboxes[i].disabled = false;
        }
    }
}