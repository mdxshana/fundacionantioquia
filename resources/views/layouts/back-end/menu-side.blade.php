<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li>
            <a href="index.html"><i class="icon-desktop"></i> <span class="name">Dashboard</span></a>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse"><i class="icon-edit"></i> <span class="name">Forms</span></a>
            <ul id="forms-collapse" class="accordion-body collapse">
                <li><a href="form_account.html">Account</a></li>
                <li><a href="form_article.html">Article</a></li>
                <li><a href="form_elements.html">Elements</a></li>
                <li><a href="form_validation.html">Validation</a></li>
                <li><a href="form_wizard.html">Wizard</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#stats-collapse"><i class="icon-bar-chart"></i> <span class="name">Statistics</span></a>
            <ul id="stats-collapse" class="accordion-body collapse">
                <li><a href="stat_statistics.html">Stats</a></li>
                <li><a href="stat_charts.html">Charts</a></li>
                <li><a href="stat_realtime.html">Realtime</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#ui-collapse"><i class="icon-magic"></i> <span class="name">User Interface</span></a>
            <ul id="ui-collapse" class="accordion-body collapse">
                <li><a href="ui_buttons.html">Buttons</a></li>
                <li><a href="ui_dialogs.html">Dialogs</a></li>
                <li><a href="ui_icons.html">Icons</a></li>
                <li><a href="ui_tabs.html">Tabs</a></li>
                <li><a href="ui_accordion.html">Accordion</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#components-collapse"><i class="icon-bookmark-empty"></i> <span class="name">Components</span></a>
            <ul id="components-collapse" class="accordion-body collapse">
                <li><a href="component_calendar.html">Calendar</a></li>
                <li><a href="component_maps.html">Maps</a></li>
                <li><a href="component_gallery.html">Gallery</a></li>
                <li><a href="component_fileupload.html">Fileupload</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#tables-collapse"><i class="icon-table"></i> <span class="name">Tables</span></a>
            <ul id="tables-collapse" class="accordion-body collapse">
                <li><a href="tables_static.html">Static</a></li>
                <li><a href="tables_dynamic.html">Dynamic</a></li>
            </ul>
        </li>
        <li class="active">
            <a href="grid.html"><i class="icon-reorder"></i> <span class="name">Grid</span></a>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#special-collapse"><i class="icon-asterisk"></i> <span class="name">Special</span></a>
            <ul id="special-collapse" class="accordion-body collapse">
                <li><a href="special_search.html">Search</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="special_404.html">404</a></li>
            </ul>
        </li>
        <li class="visible-phone">
            <a href="{{route("logout")}}"><i class="icon-signout"></i> <span class="name">Cerrar Sesión</span></a>
        </li>
    </ul>
    <div id="sidebar-settings" class="settings">
        <button type="button" data-value="icons" class="btn-icons btn btn-transparent btn-small">Icons</button>
        <button type="button" data-value="auto" class="btn-auto btn btn-transparent btn-small">Auto</button>
    </div>
</nav>