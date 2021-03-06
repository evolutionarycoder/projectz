/**
 * Created by Daniel Prince on 1/11/16.
 */
var Poem = function () {
    Structure.call(this, arguments);
};

// assign structure prototype to brand class (inherit it's methods)
Poem.prototype = Object.create(Structure.prototype);

/**
 *
 * @param data
 * @param data.name
 * @param data.poem
 * @param data.author
 * @param response Response from server
 */
Poem.prototype.updateTable = function (data, response) {
    var table = new Table("#datatable-editable tbody");
    table.changeCell(data.id, 0, data.name);
    table.changeCell(data.id, 1, data.poem);
    table.changeCell(data.id, 3, data.author);
    table.updateActionAttributes(data.id,  {
        "data-name" : data.name,
        "data-poem": data.poem,
        "data-author" :  data.author
    });
};
