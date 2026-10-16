$(document).ready(function () {
    // Home Tabs
    let tabHeader = document.getElementsByClassName('tab-header')[0];
    let tabBody = document.getElementsByClassName('tab-body')[0];

    // Checking tabs exists
    if (tabHeader && tabBody) {
        let tabsPane = tabHeader.getElementsByTagName('div');

        for (let i = 0; i < tabsPane.length; i++) {
            tabsPane[i].addEventListener('click', function () {
                tabHeader.getElementsByClassName('active')[0]?.classList.remove('active');
                tabsPane[i].classList.add('active');
                tabBody.getElementsByClassName('active')[0]?.classList.remove('active');
                tabBody.getElementsByClassName('home__trend-wrap')[i]?.classList.add('active');
            });
        }
    }

});

$(document).ready(function() {
    //All on desktop
    if (window.innerWidth > 768) {
        $( '#catalogBtn' ).on( "click", function() {
            $('#overlayMy').toggleClass( 'modalOverlay' );
            $('.header__nav_wrap').toggleClass('active');
            $('.header__burger').toggleClass('active');
        });

        $( "#overlayMy" ).on( "click", function() {
            $(this).removeClass( 'modalOverlay' );
            $('.header__nav_wrap').removeClass( 'active' );
            $('.header__burger').removeClass( 'active' );
        });
    }
    //All on mobile
    if (window.innerWidth <= 768) {

        let scrollPosition = 0;
        let scrollLockEnabled = false;
        let lastScrollY = window.scrollY;
        let ticking = false;
        const threshold = 10;
    
        const targets = $('.header__burger, .headerMobileWrapper, .headerLogo, .headerMobileSearch, .header__middle__right__login, .headerMobileDataBtn'); // список элементов для скрытия/показа
        let isHidden = false;
    
        function lockScroll() {
            scrollPosition = window.scrollY;
            scrollLockEnabled = true;
    
            $('body').css({
                position: 'fixed',
                top: `-${scrollPosition}px`,
                width: '100%'
            }).addClass('body--no-scroll');
        }
    
        function unlockScroll() {
            scrollLockEnabled = false;
    
            $('body').removeClass('body--no-scroll').css({
                position: '',
                top: '',
                width: ''
            });
            window.scrollTo(0, scrollPosition);
        }
    
        // SCROLL SHOW/HIDE logic
        function onScroll() {
            const currentScrollY = window.scrollY;
            const diff = currentScrollY - lastScrollY;
    
            if (Math.abs(diff) > threshold) {
                if (diff > 0 && !isHidden) {
                    // Scroll down
                    targets.addClass('hidden');
                    isHidden = true;
                } else if (diff < 0 && isHidden) {
                    // Scroll up
                    targets.removeClass('hidden');
                    isHidden = false;
                }
            }
    
            lastScrollY = currentScrollY;
            ticking = false;
        }
    
        window.addEventListener('scroll', function () {
            if (scrollLockEnabled) return;
    
            if (!ticking) {
                window.requestAnimationFrame(onScroll);
                ticking = true;
            }
        });
    
        // MENU TOGGLERS
        $('#catalogBtn').on("click", function () {
            const isActive = $('.header__burger').hasClass('active');
    
            if (isActive) {
                $('#overlayMy').removeClass('modalOverlay');
                $('.header__burger').removeClass('active');
                $('#headerMobileCategories').removeClass('active');
                unlockScroll();
            } else {
                $('#overlayMy').addClass('modalOverlay');
                $('.header__burger').addClass('active');
                $('#headerMobileCategories').addClass('active');
                $('#headerMobileMenu').removeClass('active');
                $('#mobileSearchForm').removeClass('active');
                lockScroll();
            }
        });
    
        $('#mobileCommonMenu').on("click", function () {
            const isActive = $('#headerMobileMenu').hasClass('active');
    
            if (isActive) {
                $('#overlayMy').removeClass('modalOverlay');
                $('#headerMobileMenu').removeClass('active');
                unlockScroll();
            } else {
                $('#overlayMy').addClass('modalOverlay');
                $('#headerMobileMenu').addClass('active');
                $('.header__burger').removeClass('active');
                $('#headerMobileCategories').removeClass('active');
                $('#mobileSearchForm').removeClass('active');
                lockScroll();
            }
        });
    
        $('#mobileSearch').on("click", function () {
            const isActive = $('#mobileSearchForm').hasClass('active');
    
            if (isActive) {
                $('#overlayMy').removeClass('modalOverlay');
                $('#mobileSearchForm').removeClass('active');
                unlockScroll();
            } else {
                $('#overlayMy').addClass('modalOverlay');
                $('#mobileSearchForm').addClass('active');
                $('#headerMobileMenu').removeClass('active');
                $('.header__burger').removeClass('active');
                $('#headerMobileCategories').removeClass('active');
                lockScroll();
            }
        });
    
        $('#overlayMy').on("click", function () {
            $(this).removeClass('modalOverlay');
            $('.header__burger').removeClass('active');
            $('#headerMobileMenu').removeClass('active');
            $('#headerMobileCategories').removeClass('active');
            $('#mobileSearchForm').removeClass('active');
            unlockScroll();
        });

        
    }
    
    


    //Mobile moves
    function moveDivForMobile() {
        const myDiv = document.getElementsByClassName('calendar__wrap')[0];
        const container = document.getElementsByClassName('mobile__calendar')[0];


        //Mobile menu
        const headerMobileMenu = document.getElementById('mobileNavShop');
        const headerMobileAkcii = document.getElementById('mobileNavAkcii');
        const headerMobileEmail = document.getElementById('headerMobileEmail');
        const headerMobilePhone = document.getElementById('headerMobilePhone');
        const headerMobileSocial = document.getElementById('headerMobileSocial');
        const headerMobileCategoriesContainer = document.getElementById('headerMobileCategories');

        const mobileOrdersList = document.getElementById('mobileOrdersList');
        const mobileOrders = document.getElementById('mobileOrders');


        const headerMobileMenuContainer = document.getElementById('headerMobileMenu');

        //Mobile categories
        const headerMobileCategoriesMove = document.getElementById('headerMobileCategoriesMove');

        if (window.innerWidth <= 768) {
            if (container && myDiv) {
                container.appendChild(myDiv);
            }
            if(mobileOrdersList && mobileOrders){
                mobileOrdersList.appendChild(mobileOrders);
            }
            //Mobile menu
            if (headerMobileMenuContainer) {
                [
                    headerMobileMenu,
                    headerMobileAkcii,
                    headerMobileEmail,
                    headerMobilePhone,
                    headerMobileSocial,
                ].filter(Boolean).forEach((item) => headerMobileMenuContainer.appendChild(item));
            }
            

            //Mobile categories
            if (headerMobileCategoriesContainer && headerMobileCategoriesMove) {
                headerMobileCategoriesContainer.appendChild(headerMobileCategoriesMove);
            }
            
        }
    }

    window.addEventListener('load', moveDivForMobile);
    window.addEventListener('resize', moveDivForMobile);

});
