<template>
    <div >

        <!-- Fixed Center Placement Toast Starts -->
        <div
            aria-live="polite"
            aria-atomic="true"
            id="toast-div"
            class="toast-placement d-flex justify-content-center align-items-center"
            data-autohide="true"
        >
            <div
                style="position: fixed; top: 1rem;right: 50%; z-index: 1030">
                <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <strong class="mr-auto">{{data.title}}</strong>
                        <small class="text-muted">{{ data.time }}</small>
                        <button type="button"
                                class="ml-50 close"
                                data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">{{data.message}}.</div>
                </div>
            </div>
        </div>
        <!-- Fixed Center Placement Toast ends -->

    </div>
</template>

<script>
    export default {
        props:['data'],
        mounted() {}
    }
</script>
