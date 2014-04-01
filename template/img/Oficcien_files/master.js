//Finish Loading
$(function () {
    //Add the class "Odd" to Job Category List
    $('.banner .job-category .category-list ul:even').addClass('odd');
    //Init placeholder
    //Placeholders.init();
    //Clicking on Job Category
    $('.search-area-wrapper .tab-jobcategories').click(function () {
        var currClass = $(this).attr('class').split(' ');
        if (currClass.indexOf("active-tab") === -1) {
            $('.search-area-wrapper .tab-searchjob').removeClass('active-tab');
            $(this).addClass('active-tab');
            $('.banner .search-area').hide();
            $('.banner .job-category').slideToggle('fast');
        }
    });
    //Clicking on Search Job
    $('.search-area-wrapper .tab-searchjob').click(function () {
        var currClass = $(this).attr('class').split(' ');
        if (currClass.indexOf("active-tab") === -1) {
            $('.search-area-wrapper .tab-jobcategories').removeClass('active-tab');
            $(this).addClass('active-tab');
            $('.banner .job-category').hide();
            $('.banner .search-area').slideToggle('fast');
        }
    });
    $('.search-area-wrapper .search-textbox').each(function () {
        var currPlaceHolder = $(this).attr('placeholder');
        $(this).focus(function () {
            if ($(this).val() === 'Enter job title, position,...' || $(this).val() == 'Nhập chức danh, vị trí công việc,...') {
                $(this).attr('value', '');
            }
            $(this).removeAttr('placeholder');
        })
            .blur(function () {
                if (isEmpty($(this).val())) {
                    $(this).attr('value', currPlaceHolder);
                }
                $(this).attr('placeholder', currPlaceHolder);
            }
        );
    });
    $('header .main-menu-wrapper').click(function (event) {
        var mainMenuDialog = $('header .main-menu-dialog');
        event.stopPropagation();
        if (hideMainMenu() === false) {
            $('header .main-menu-wrapper').addClass('hover');
            // fix bug ie7
            if (typeof(mainMenuDialog.stop) == "function") {
                mainMenuDialog.stop(true, false);
            }
            mainMenuDialog.slideToggle('fast');
        }
    });
    $('html').click(function (event) {
        /**
         * prevent click inside menu dialog not close
         */
        if ($(event.target).parent("div.main-menu-dialog").length === 0) {
            hideMainMenu();
        }
    });
});
// Slide Main Menu
Array.prototype.indexOf = function(obj, start) {
    for (var i = (start || 0), j = this.length; i < j; i++) {
        if (this[i] === obj) { return i; }
    }
    return -1;
}

function hideMainMenu() {
    var mainMenu = $('header .main-menu-wrapper'),
        mainMenuDialog = $('header .main-menu-dialog'),
        currClass = mainMenu.attr('class').split(' ');

    if (currClass.indexOf("hover") > -1) {
        // fix bug ie7
        if (typeof(mainMenuDialog.stop) == "function") {
            mainMenuDialog.stop(true, false);
        }
        mainMenuDialog.slideToggle('fast', function () {
            mainMenu.removeClass('hover');
        });
        return true;
    } else {
        return false;
    }
}
function countProperty(obj) {
    var count = 0;
    for (var k in obj) {
        if (obj.hasOwnProperty(k)) {
            ++count;
        }
    }
    return count;
}
function isEmpty(value, allowEmptyString) {
    return (value === null) || (value === 'null') || (value === undefined) || (value === 'undefined') || (!allowEmptyString ? value === '' : false) || (typeof (value) === 'object' && countProperty(value) === 0);
}