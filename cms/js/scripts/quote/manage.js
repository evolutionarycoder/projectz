/**
 * Created by evolutionarycoder on 2/5/16.
 */

var submitBtn = document.querySelector("#create"),
    manage    = new Manager("quote.php"),
    notif     = new Notify(),
    validate  = new Validate(),
    /**
     *@type Quote
     */
    quote;

if (submitBtn) {
    quote = new Quote("quote");
    submitBtn.addEventListener("click", function (e) {
        e.preventDefault();
        var data = quote.getFormValues().getValues();
        if (validate.isFieldsEmpty(data)) {
            notif.error("Please fill in all fields");
            return;
        }
        manage.performCreate(data);
    }, false);
} else {
    var updateBtn = document.querySelector("#update");
    quote         = new Quote("id", "quote");
    updateBtn.addEventListener("click", function (e) {
        e.preventDefault();
        var data = quote.getFormValues(true).getValues();
        if (validate.isFieldsEmpty(data)) {
            notif.error("Please fill in all fields");
            return;
        }
        manage.performUpdate(data, quote.updateTable);
    }, false)
}