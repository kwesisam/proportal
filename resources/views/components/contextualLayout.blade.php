<div x-data="{ 
    contextMenuOpen: false,
    contextMenuToggle: function(event) {
        this.contextMenuOpen = true;
        event.preventDefault();
        this.$refs.contextmenu.classList.add('opacity-0');
        let that = this;
        $nextTick(function(){
            that.calculateContextMenuPosition(event);
            that.calculateSubMenuPosition(event);
            that.$refs.contextmenu.classList.remove('opacity-0');
        });
    },
    calculateContextMenuPosition (clickEvent) {
        if(window.innerHeight < clickEvent.clientY + this.$refs.contextmenu.offsetHeight){
            this.$refs.contextmenu.style.top = (window.innerHeight - this.$refs.contextmenu.offsetHeight) + 'px';
        } else {
            this.$refs.contextmenu.style.top = clickEvent.clientY + 'px';
        }
        if(window.innerWidth < clickEvent.clientX + this.$refs.contextmenu.offsetWidth){
            this.$refs.contextmenu.style.left = (clickEvent.clientX - this.$refs.contextmenu.offsetWidth) + 'px';
        } else {
            this.$refs.contextmenu.style.left = clickEvent.clientX + 'px';
        }
    },
    calculateSubMenuPosition (clickEvent) {
        let submenus = document.querySelectorAll('[data-submenu]');
        let contextMenuWidth = this.$refs.contextmenu.offsetWidth;
        for(let i = 0; i < submenus.length; i++){
            if(window.innerWidth < (clickEvent.clientX + contextMenuWidth + submenus[i].offsetWidth)){
                submenus[i].classList.add('left-0', '-translate-x-full');
                submenus[i].classList.remove('right-0', 'translate-x-full');
            } else {
                submenus[i].classList.remove('left-0', '-translate-x-full');
                submenus[i].classList.add('right-0', 'translate-x-full');
            }
            if(window.innerHeight < (submenus[i].previousElementSibling.getBoundingClientRect().top + submenus[i].offsetHeight)){
                let heightDifference = (window.innerHeight - submenus[i].previousElementSibling.getBoundingClientRect().top) - submenus[i].offsetHeight;
                submenus[i].style.top = heightDifference + 'px';
            } else {
                submenus[i].style.top = '';
            }
        }
    }
    }" 
    x-init="
        $watch('contextMenuOpen', function(value){
            if(value === true){ document.body.classList.add('overflow-hidden') }
            else { document.body.classList.remove('overflow-hidden') }
        });
        window.addEventListener('resize', function(event) { contextMenuOpen = false; });
    "
    @contextmenu="contextMenuToggle(event)" class="relative p-2">

    {{ $slot }}
</div>
