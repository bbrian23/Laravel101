import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head} from '@inertiajs/vue3'
import '../css/app.css'

createInertiaApp({
    progress: {
        color: '#ff0000',        // any hex color you want
        showSpinner: true,       // show spinner or not            // delay in ms before showing
        includeCSS: true,        // include default CSS
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        return pages[`./Pages/${name}.vue`]()
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el)
    },
    title: title=>"My App - "+title,
})