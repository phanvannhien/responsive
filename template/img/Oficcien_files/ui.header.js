/**
 * Created by minhdd on 12/5/13.
 */
function includeJS(incFile)
{
    document.write('<script type="text/javascript" src="'+ base_url + 'js/' + incFile+ '"></script>');
}
includeJS('placeholders_autoinit.js?version='+system_version);
//includeJS('Placeholders.min.js?version='+system_version);
//Placeholders.init();
includeJS('jquery/chosen.jquery.js?version='+system_version);
includeJS('jqueryUiQuickSearchBlock.js?version='+system_version);
includeJS('quickSearchBlock.js?version='+system_version);
includeJS('master.js?version='+system_version);
