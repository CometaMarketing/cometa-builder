jQuery(document).ready(function($) {
    console.log('Cometa Sidebar Script Loaded');

    // Ensure sidebar element exists
    if ($('#cometa-sidebar').length === 0) {
        $('body').append(`
            <div id="cometa-sidebar">
                <div id="cometa-toggle-bar">⧽</div>
                <iframe src="https://cometamarketing.com.br/biblioteca-cometa-builder/" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
        `);
    }

    // Ensure open button exists
    if ($('#cometa-open-btn').length === 0) {
        $('body').append('<button id="cometa-open-btn">+</button>');
    }

    function openSidebar() {
        $('#cometa-sidebar').addClass('open');
        $('#cometa-open-btn').hide();
    }

    function minimizeSidebar() {
        $('#cometa-sidebar').removeClass('open');
        $('#cometa-open-btn').show();
    }

    $('#cometa-open-btn').on('click', function() {
        openSidebar();
    });

    $('#cometa-toggle-bar').on('click', function() {
        minimizeSidebar();
    });
});
