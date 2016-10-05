//Display modals/popups when trigger elements clicked

var modalTransitionIn = "fadeIn"; //'fadeIn', 'slideDown', 'slideUp', 'slideIn', 'slideBack'
var isLoggedIn = false;
var isTablet = false;
var modalX, modalY;
var loginURL = "";
var isMobile = false;
var loginModal = null;

$(function () {

    console.log("Script included and ran");

 //Handle LOGIN button click
    //Display modals/popups when trigger elements clicked
    $(".login").click(function(){
        console.log("Clicked login");
        var boxoutLogin = $(this).hasClass("boxoutLogin");
        console.log(boxoutLogin);
        attemptLogin(boxoutLogin);
    });


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
    // $("#ModalPlaceholder").load("../templates/templates.html .modal", function(){
    postImportProcessing();
    //     //consoleLog("Template file processed...");
    //     setTimeout(checkLogin(), 2000);
    //     // setTimeout(checkForArticle(), 2000);

    //     if (!isTablet) {
    //     	console.log("setting DDL");
    //         setTimeout(initDDL(), 2000);
    //     }
    //     else {
    //     	console.log("removing classes");
    //         $(".header .tooltipTrigger").remove();
    //     }

    //     if (isMobile)
    //         applyMobileTweaks();
    // });
    

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

function postImportProcessing()
{
    /*
    * For DOM elements dynamically added to the page, they will not automatically be detected by the jQuery
    * click handlers (for example), so need to manually register their events below...
    */

    //Ensure that Modal Triggers pop their Modals (eg- The 'login' button in header)
    $("body").delegate(".modalTrigger", "click", function(){
        //checkForLoginURL(this);

        loginURL = $(this).data("url");    //consoleLog("data-url: " + loginURL);
        if (!isValidText(loginURL))
            loginURL = "";
        //else
            //consoleLog("URL to go to once logged-in: " + loginURL);

        showModal($(this).attr("rel"));
    });

    $("body").delegate("#Modal_Login .login", "click", function(){
        attemptLogin(false);
    });

    //Handle LOGOUT button click
    $("body").delegate("#Modal_Logout #btnYes", "click", function(){
        //Delete user cookie storing Login state
        $.removeCookie("TOLMAR_LoggedIn", { path: '/' });

        //Take user back to HOME page
        //window.location = window.location.href.replace("v=1", ""); //Will do above login-only page check above when loads page again...
        window.location = "index.html";
        return false;
    });
    $("body").delegate("#Modal_Logout #btnNo", "click", function(){
        $("#Modal_Logout").bPopup().close();
    });

    //Handle Login Boxout or Modal ENTER keypress to login
    $("body").delegate("#txtNumber_Modal", "keypress", function(event) {
        if ( event.which == 13 ) {
            attemptLogin(false);
            event.preventDefault();
        }
    });
    $("body").delegate("#txtNumber_Boxout", "keypress", function(event) {
        if ( event.which == 13 ) {
            attemptLogin(true);
            event.preventDefault();
        }
    });

    //Display modals/popups when trigger elements clicked
    $("body").delegate("a.external", "click", function(){

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

    //Handle HAMBURGER Menu trigger taps
    $("body").delegate(".mobileMenu .hamburger", "click", function(){
        $(this).toggleClass("active");
        $(".mobileMenu ul").slideToggle();
    });

    //Assign the 'active' class to appropriate header/nav menu link/s
    // activeLink = getPageName();
    // $(".header a[href='" + activeLink +".html']").addClass("active");
    // $(".header a[href='" + activeLink +".html']").prev("li").addClass("active");
}




function showModal(modalID)
{
    console.log("Showing Modal: " + modalID);

    //if (isMobile)
        //hideMobileMenu();

    //Some Modals need additional pre-loading stuff done
    if (modalID == "#Modal_Login")
    {
        //Reset
        $("#Modal_Login p.msg").hide().html("");
        $("#Modal_Login #txtNumber_Modal").val("");
        setTimeout(function(){ $("#txtNumber_Modal").focus(); }, 500);
    }



    $(modalID).bPopup({
        zIndex: 1000,
        modalClose: true,
        closeClass: 'close',
        opacity: 0.6,
        appending: false,
        scrollBar: true,
        position: (isMobile ? ['auto',50] : ['auto','auto']),
        amsl: 0,
        transition: modalTransitionIn,

        //Start/stop video if this is a Modal with a video
        onOpen: function(){ if ($(modalID + ".modal.video").length){startVideo();} },
        onClose: function(){ if ($(modalID + ".modal.video").length){stopVideo();} }
    });

    return false;
}


/* VALIDATION OF PROVIDER # */
//Attempt login using Provider Number
function attemptLogin(boxoutLogin)
{
    console.log("Attempting LOGIN...");

    var validLogin = false;
    var code = "";

    //Reset
    $("#Modal_Login p.msg").hide().html("");

    //Check for valid text in the appropriate input box... (Home page boxout or Login Modal)
    if (boxoutLogin)
        code = $("#txtNumber_Boxout").val();
    else
        code = $("#txtNumber_Modal").val();

    //consoleLog("Entered login code/number: " + code);

    //If nothing valid entered...
    if (!isValidText(code))
    {
        if (boxoutLogin)
        {
            //Show the Error Message in custom modal
            if (!isTablet)
                showCustomModal("Number Required", "Please provide either your Provider Number<br>or AHPRA Number to log in.");
            else
                showCustomModal("Number Required", "Please provide either your Provider Number or AHPRA Number to log in.");
        }
        else
        {
            //Show the validation message within the Login Modal itself
            $("#Modal_Login p.msg").html("Please provide Provider/AHPRA Number").slideDown();
        }

        return;
    }

    //Attempt Provider number login, then if that fails try AHPRA number login...
    validLogin = isProviderNumberValid(code);
    if (!validLogin)
        validLogin = isAHPRANumberValid(code);

    if (validLogin)
    {
        logUserIn();
    }
    else
    {
        //Neither Provider # or AHPRA # matched!
        if (boxoutLogin)
        {
            //Show the Error Message in custom modal
            showCustomModal("Invalid Login", "Incorrect Provider/AHPRA Number entered.<br>Please try again.");
        }
        else
        {
            //Show the validation message within the Login Modal itself
            $("#Modal_Login p.msg").html("Incorrect Provider/AHPRA Number entered.<br>Please try again.").slideDown();
        }
    }
}

function isProviderNumberValid(provNum)
{
    //Extract Provider number
    provNum = provNum.toUpperCase();

    //Validate on length (must be 8 chars long)
    if (provNum.length != 8)
        return false;

    //Validate on character 7
    var char7 = Number(calcChar7(provNum.charAt(6)));
    if (char7 == -1)
        return false;

    //STEP 1 - Generate total
    var total = (Number(provNum.charAt(0))*3) + (Number(provNum.charAt(1))*5) + (Number(provNum.charAt(2))*8) + (Number(provNum.charAt(3))*4) + (Number(provNum.charAt(4))*2) + Number(provNum.charAt(5)) + (char7*6);

    //STEP 2 - Generate 'check' number
    var checkNum = total%11;

    //STEP 3 - Determine char 8 value, test validity
    var char8 = calcChar8(checkNum);
    if (char8 == -1)
        return false;

    //STEP 4 - Check validity
    if (/*provNum[7]*/provNum.charAt(7) == char8)
    {
        $('#Modal_Login .required').slideUp();

        logUserIn();
    }
    else
        return false;

    return true;
}

function logUserIn()
{
    //consoleLog("Logging user in...");

    //Set Login Cookie (valid for 1 day)
    $.cookie("TOLMAR_LoggedIn", "true", { path: '/', expires: 1 });

    //Redirect to requested URL (if any)
    if (isValidText(loginURL))
    {
        if (loginURL.indexOf("?") > 0)
            window.location = loginURL + "&v=1";    //Already has other QS params...
        else
            window.location = loginURL + "?v=1";
    }
    else
    {
        /*if (window.location.href.indexOf("v=1") > 0)
            window.location = window.location.href; //TODO - Check if link has a href, and take user to that...
        else
            window.location = window.location.href + "?v=1"; //TODO - Check if link has a href, and take user to that...*/

        window.location = "resources";
    }
    return false;
}

function isAHPRANumberValid(number)
{
    //Valid if 3x chars followed by 10x digits
    var regex = new RegExp(/^[a-z]{3}\d{10}$/i);
    return regex.test(number);
}

function calcChar7(char7)
{
    switch (char7)
    {
        //0-9 return actual value
        case '0': return 0;
        case '1': return 1;
        case '2': return 2;
        case '3': return 3;
        case '4': return 4;
        case '5': return 5;
        case '6': return 6;
        case '7': return 7;
        case '8': return 8;
        case '9': return 9;

        //Anything else based on following values
        case 'A': return 10;
        case 'B': return 11;
        case 'C': return 12;
        case 'D': return 13;
        case 'E': return 14;
        case 'F': return 15;
        case 'G': return 16;
        case 'H': return 17;
        case 'J': return 18;
        case 'K': return 19;
        case 'L': return 20;
        case 'M': return 21;
        case 'N': return 22;
        case 'P': return 23;
        case 'Q': return 24;
        case 'R': return 25;
        case 'T': return 26;
        case 'U': return 27;
        case 'V': return 28;
        case 'W': return 29;
        case 'X': return 30;
        case 'Y': return 31;

        default: return -1;
    }
}

function calcChar8(char8)
{
    switch (char8)
    {
        case 0: return 'Y';
        case 1: return 'X';
        case 2: return 'W';
        case 3: return 'T';
        case 4: return 'L';
        case 5: return 'K';
        case 6: return 'J';
        case 7: return 'H';
        case 8: return 'F';
        case 9: return 'B';
        case 10: return 'A';
        default: return -1;
    }
}

/*
* NOTE: This function called once page loaded, as seems to be the only way to reliably select dynamically-loaded DOM elements
*/
function checkLogin()
{
    //Check Cookie status
    var valid = $.cookie("TOLMAR_LoggedIn");
    if (!valid || valid == null || valid == 'null' || valid.toLowerCase() == "" || valid.toLowerCase() == "false")
    {
        //consoleLog("User NOT logged-in!");
        isLoggedIn = false;

        //As cookies need Round-trips to server, may not be readable yet, so check for QS param (TEMP fix)
        var validLogin = getQueryString()["v"];
        if (isValidText(validLogin) && Number(validLogin) == 1)
        {
            //Stay on the page, create LOGIN cookie so they can keep browsing the site...
            $.cookie("TOLMAR_LoggedIn", "true", { path: '/', expires: 1 });
            isLoggedIn = true;
        }
    }
    else
    {
        //consoleLog("User IS logged-in!");
        isLoggedIn = true;
    }

    //Check Login restrictions and visibility of elements
    if (isLoggedIn)
    {
        //consoleLog("Toggling 'loginOnly' elements ON...");
        //$(".free, .loginOnly").toggle();

        $(".free").hide();
        $(".loginOnly").show();
    }
    else
    {
        //Check if this page requires Login. If it does, boot user to Home Page...
        if ($(".requiresLogin").length)
        {
            //consoleLog("Redirecting user from HCP-only page back to Home Page, as they're not logged-in...");

            $.removeCookie("TOLMAR_LoggedIn", { path: '/' });
            window.location = "index.html";
            return;
        }
    }
}
function getQueryString()
{
    var result = {}, queryString = location.search.substring(1), re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString))
    {
        result[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }

    return result;
}

function isValidText(text)
{
    if (text != undefined && text != null && text != "" && text.length > 0)
        return true;
    else
        return false;
}

function isValidEmail(email)
{
    var regex = new RegExp(/^(([\w-\s]+)|([\w-]+(?:\.[\w-]+)*)|([\w-\s]+)([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return regex.test(email);
}


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

