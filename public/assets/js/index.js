$(document).ready(function() {

    //add new row in tables on add click
    $('#addToSection1').click(function() {
        if (rowInputsIsEmpty('#section1Table','section1')) {
            alert('Unable to add new row< the last one has empty fields.');
        } else {
            addNewRow('#section1Table','section1');
        }
    });

    $('#addToSection2').click(function() {
        if (rowInputsIsEmpty('#section2Table','section2')) {
            alert('Unable to add new row the last one has empty fields.');
        } else {
            addNewRow('#section2Table','section2');
        }
    });

});