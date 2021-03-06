/**
 * Created by Daniel Prince on 1/9/16.
 */
var submitBtn = document.querySelector("#create"),
    manage    = new Manager("poem.php"),
    notif     = new Notify(),
    validate  = Validate(),
    poem,
    options = {
        checkIsEmpty : true,
        specific :[
            {
                property : "name",
                length : 120,
                msg : "Poem Name has to many characters."
            },
            {
                property : "author",
                length : 45,
                msg : "Author has to many characters"
            }
        ]
    };

if (submitBtn) {
    poem = new Poem("name", "poem", "author");
    submitBtn.addEventListener("click", function (e) {
        e.preventDefault();
        var data = poem.getFormValues().getValues();
        if (validate.validate(data, options)) {
            notif.error("Fill in all fields");
            return;
        }
        manage.performCreate(data);
    }, false);
} else {
    var updateBtn = document.querySelector("#update");
    poem          = new Poem("id", "name", "poem", "author");
    updateBtn.addEventListener("click", function (e) {
        e.preventDefault();
        var data = poem.getFormValues(true).getValues();
        if (validate.validate(data, options)) {
            notif.error("Please fill in all fields");
            return;
        }
        manage.performUpdate(data, poem.updateTable);
    }, false)
}