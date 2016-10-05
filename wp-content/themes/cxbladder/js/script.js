    //Display modals/popups when trigger elements clicked

$(function () {

    console.log("Script included and ran");



    /* Tablet version has smaller header */
    var windowWidth = $(window).width();
    if (windowWidth <= 1024)
    {
        isTablet = true;
    }
    if (windowWidth <= 320)
    {
        isMobile = true;
    }

    //Reset
    loginURL = "";

	console.log("setting DDL");
    setTimeout(initDDL(), 2000);

    //Import content from templates
    //NOTE: Chaining load in callbacks to ensure things are loaded correctly before continuing...
    	        $("#ModalPlaceholder").load("templates/templates.html .modal", function(){
                    postImportProcessing();
                    //consoleLog("Template file processed...");
                    setTimeout(checkLogin(), 2000);
                    setTimeout(checkForArticle(), 2000);

                    if (!isTablet) {
                    	console.log("setting DDL");
                        setTimeout(initDDL(), 2000);
                    }
                    else {
                    	console.log("removing classes");
                        $(".header .tooltipTrigger").remove();
                    }

                    if (isMobile)
                        applyMobileTweaks();
                });
    

    $("body").delegate("a.external", "click", function(){
    	// console.log("clicked");
        //Store the URL user clicked on
        var url = $(this).attr("rel");  //Needs to be rel attribute, in case right-click new tab selected, would get around confirmation...
        $("#hdnURL").val(url);
        $("#Modal_External").bPopup({ closeClass: 'close', opacity: 0.75, appending: false, scrollBar: true, zIndex: 1006 });

        return false;
    });

    //Continue button clicked
    $("body").delegate("#Modal_External .continue", "click", function(){
        $("#Modal_External").bPopup().close();
        window.open($("#hdnURL").val());
    });


});


function initDDL()
{
    //$(".tooltipTrigger").tooltip();
    $(".tooltipTrigger").tooltip({
        // effect: 'slide',
        bounce: true,
        relative: true,
        position: 'bottom center',
        offset: [82,0],
        delay: 100,
        events: { input: 'click,blur' }
    });
	console.log("hey");
    console.log($(".tooltipTrigger"));
}

