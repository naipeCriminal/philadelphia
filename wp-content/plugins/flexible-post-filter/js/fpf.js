jQuery.noConflict();
/*
pasteleria-y-cafeteria
hoteles-y-restauranteso
panaderia
*/
jQuery(document).ready(function($) {

    // get the action filter option item on page load
    var jQueryfilterType = $(' .checkbox ').data('filtro');


    // get and assign the ourHolder element to the
    // jQueryholder varible for use later
    var jQueryholder = $('div.ourHolder');

    // clone all items within the pre-assigned jQueryholder element
    var jQuerydata = jQueryholder.clone();

    // attempt to call Quicksand when a filter option
    // item is clicked
    $('.checkbox ').click(function(e) {
        $(".checkbox").not(this).removeClass('selected');
        $(this).addClass('selected');

        $('.input-checkbox').not(this).attr("checked", false);
        $(this).find('.input-checkbox').attr("checked", true);
        // reset the active class on all the buttons

        // assign the class of the clicked filter option
        // element to our jQueryfilterType variable
        var jQueryfilterType = $(this).data('filtro');



        if (jQueryfilterType == 'all') {
            // assign all li items to the jQueryfilteredData var when
            // the 'All' filter option is clicked
            var jQueryfilteredData = jQuerydata.find('div.square-recipe');
        } else {
            // find all div elements that have our required jQueryfilterType
            // values for the data-type element

            var jQueryfilteredData = jQuerydata.find('div.square-recipe[data-type~=' + jQueryfilterType + ']');
        }

        // call quicksand and assign transition parameters
        jQueryholder.quicksand(jQueryfilteredData, {
            duration: 900,
            adjustWidth: "auto",
            easing: 'easeInOutQuart'
        });
        return false;
    });
});