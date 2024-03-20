<div {{ $attributes }}
    x-data="{
        message: '',
        link: '',
        handleExport: async () => axios.post('/export-pdf')
    }"
    x-init="
        const channel = Echo.private('App.Models.User.' + {{ auth()->id() }})

        channel.listen('ExportPdfStatusUpdated', (e) => {
            message = e.message
            if (e.link) link = e.link
        })
    "
>
    <button
        x-on:click="await handleExport()"
        class="bg-blue-600 text-white rounded px-4 py-3 mr-4"
        type="button"
    >
        {{ $slot }}
    </button>
    <span class="font-bold" x-text="message.includes('Error:') ? message.slice(6) : message" :class="{ 'text-red-500': message.includes('Error:') }"></span>
    <template x-if="link">
        <a x-bind:href="link" x-text="link" target="_blank" class="text-blue-600 underline"></a>
    </template>
</div>
