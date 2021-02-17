<div x-data="noticesHandler()" x-on:notice.window="add($event.detail)">
    <div class="fixed z-20 right-0 top-0 m-5 w-1/2 xl:w-1/4 lg:w-1/3 md:w-1/2">
        <template x-for="notice of notices" :key="notice.id">
            <div
                x-show="visible.includes(notice)"
                x-transition:enter="transition ease-in duration-200"
                x-transition:enter-start="transform opacity-0 translate-x-full"
                x-transition:enter-end="transform opacity-100 translate-x-0"
                x-transition:leave="transition ease-out duration-500"
                x-transition:leave-start="transform translate-x-0 opacity-100"
                x-transition:leave-end="transform translate-x-full opacity-0"
                x-on:click="remove(visible.indexOf(notice))"
                class="relative py-3 px-4 shadow-lg mb-2 border-l-4 grid grid-cols-3"
                :class="{
                    'bg-green-500 border-green-700 text-white' : notice.type === 'success',
                    'bg-blue-400 border-blue-700' : notice.type === 'info',
                    'bg-yellow-400 border-yellow-700' : notice.type === 'warning',
                    'bg-red-500 border-red-800 text-white' : notice.type === 'error',
                }"
                style="box-shadow: inset 8px 0px 10px -5px rgba(0, 0, 0, 0.87);"
            >
                <div class="col-start-1 col-span-3">
                    <span x-text="notice.text"></span>
                </div>
            </div>
        </template>
    </div>
</div>
@if(session()->has('success_message'))
    <div
        x-data="{}"
        x-init="() => $dispatch('notice', {type: 'success', text: '{{ session('success_message') }}'})"
    >
    </div>
@endif
@if(session()->has('error_message'))
    <div
        x-data="{}"
        x-init="() => $dispatch('notice', {type: 'error', text: '{{ session('error_message') }}'})"
    >
    </div>
@endif

<script type="text/javascript">
    function noticesHandler() {
        return {
            notices: [],
            visible: [],
            add(notice) {
                console.log(notice)
                notice.id = Date.now();
                this.notices.splice(0, 0, notice);
                this.fire(notice);
            },
            fire(notice) {
                this.visible.push(notice);

                setTimeout(() => {
                    this.remove(this.visible.indexOf(notice));
                }, 2500 * (this.visible.length / 2 + 1));
            },
            remove(index) {
                this.visible.splice(index, 1);
            },
        };
    }
</script>