var selectedCell = '';
var selectedCellID = '';
var qty = {};
var rate = {};
var inputQty = {};
var inputRate = {};
$(document).ready(function() {
    // all jquery goes here...
    var itemCellBG = $('.item').css('background-color');
    $('tr.header.item').click(function() {
        var currentCellID = $(this).find('.serialID')[0].innerText;
        console.log('selectedCell: '+window.selectedCell);
        console.log('selectedCellID: '+selectedCellID);
        console.log('currentCellID: '+currentCellID);
        if(selectedCellID != currentCellID) {
            selectedCellID = currentCellID;
            if(selectedCell != '') {
                console.log('selectedCell not empty - calling deselectLast');
                deselectLast();
            } else {
                console.log('selectedCell empty - assigning $(this) & calling editItem');
                selectedCell = $(this);
                editItem(selectedCell);
            }
        }
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if(!target.closest(selectedCell).length && selectedCell != '') {
            console.log('clickedOutsideSelectedCell');
            deselectLast();
        }
    });

    $(document).keydown(function(e) {
        if (e.key === "Escape") {
            deselectLast();
        }
    });

    function deselectLast() {
        console.log('deselectLast called');
        restoreValues(qty, inputQty);
        restoreValues(rate, inputRate);
        flushContainers();
        if(window.selectedCell != '') {
            window.selectedCell.css('background-color', itemCellBG);
        }
        window.selectedCell = '';
        window.selectedCellID = ''; //required for the conditional check to work in $(tr.header.item).click function
    }

    function restoreValues(valueCellObjStore, inputBox) {
        $.each(valueCellObjStore, function(index, val) {
            $(this).show();
            $(inputBox[index]).hide();
        });
    }

    function flushContainers() {
        qty = {};
        rate = {};
        inputQty = {};
        inputRate = {};
        console.log('after flush: ', qty, rate, inputQty, inputRate);
    }

    function editItem(selectedItem) {
        console.log('editItem called');
        selectedItem.css('background-color', 'cornsilk');
        qtyCells = selectedItem.children('.qtyCell');
        rateCells = selectedItem.children('.rateCell');
        addValueCellPlaceholder(qtyCells, 'qtyVal');
        addValueCellPlaceholder(rateCells, 'rateVal');
        addInputBox(qty, qtyCells, 'qtyVal', inputQty);
        addInputBox(rate, rateCells, 'rateVal', inputRate);
        inputQty[0].focus();
        console.log(qty, rate);
        console.log(inputQty, inputRate);
    }

    function findValueCells(dataCell, valueCellClass) {
        valueCells = '';
        valueCells = $(dataCell).children('.'+valueCellClass);
        return valueCells;
    }

    function addValueCellPlaceholder(dataCells, valueCellClass) {
        $.each(dataCells, function() {
            valueCellPlaceholder = $('<span>').addClass(valueCellClass)[0];
            //$(valueCellPlaceholder).html('placeholder');
            valueCells = findValueCells(this, valueCellClass);
            if(valueCells.length == 0) {
                $(this).append(valueCellPlaceholder);
            }
        });
    }

    function addInputBox(valueCellObjStore = {}, dataCells, valueCellClass, inputBox = {}) {
        $.each(dataCells, function(index, val) {
            console.log($(this));
            valueCells = findValueCells(this, valueCellClass); // needs to be called as it's changed after adding placeholders
            valueCellObj = '';
            valueCellObj = valueCells[0];
            valueCellObjStore[index] = valueCellObj;
            console.log(valueCellObj.innerText);
            inputBox[index] = $('<input>')[0];
            $(inputBox[index]).val(valueCellObj.innerText);
            $(inputBox[index]).css('height', '20px');
            $(inputBox[index]).attr('type', 'number');
            $(valueCellObj).before($(inputBox[index]));
            $(valueCellObj).hide();
        });
    }

});
