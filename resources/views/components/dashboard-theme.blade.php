<script>
    const cssVariables = {
        '--primary-color': "{{ session('primaryColor') }}",
        '--primary-gradient-start': "{{ session('primaryGradientStart') }}",
        '--primary-gradient-end': "{{ session('primaryGradientEnd') }}",

        '--sidebar-bg-start': "{{ session('sidebarBgStart') }}",
        '--sidebar-bg-mid': "{{ session('sidebarBgMid') }}",
        '--sidebar-bg-end': "{{ session('sidebarBgEnd') }}",
        '--sidebar-text-color': "{{ session('sidebarTextColor') }}",
        '--sidebar-menu-icon-bg': "{{ session('sidebarMenuIconBg') }}",
        '--sidebar-menu-icon-hover': "{{ session('sidebarMenuIconHover') }}",
        '--sidebar-line-color': "{{ session('sidebarLineColor') }}",
        '--sidebar-menu-hover-bg': "{{ session('sidebarMenuHoverBg') }}",


        '--header-bg-start': "{{ session('headerBgStart') }}",
        '--header-bg-mid': "{{ session('headerBgMid') }}",
        '--header-bg-end': "{{ session('headerBgEnd') }}",
        '--header-text-color': "{{ session('headerTextColor') }}",
        '--header-text-muted': "{{ session('headerTextMuted') }}",
        '--header-icon-hover': "{{ session('headerIconHover') }}",

        '--body-bg-overlay': "{{ session('bodyBgOverlay') }}",
        '--content-bg-dark': "{{ session('contentBgDark') }}",
        '--content-bg-light': "{{ session('contentBgLight') }}",
        '--content-blur': "{{ session('contentBlur') }}",

        '--card-bg-dark': "{{ session('cardBgDark') }}",
        '--card-bg-light': "{{ session('cardBgLight') }}",
        '--card-border': "{{ session('cardBorder') }}",
        '--card-text': "{{ session('cardText') }}",
        '--card-text-muted': "{{ session('cardTextMuted') }}",

        '--input-bg': "{{ session('inputBg') }}",
        '--input-border': "{{ session('inputBorder') }}",
        '--input-text': "{{ session('inputText') }}",
        '--input-placeholder': "{{ session('inputPlaceholder') }}",

        '--danger-bg': "{{ session('dangerBg') }}",
        '--danger-border': "{{ session('dangerBorder') }}",
        '--danger-text': "{{ session('dangerText') }}",
    };

    Object.entries(cssVariables).forEach(([property, value]) => {
        document.documentElement.style.setProperty(property, value);
    });
</script>