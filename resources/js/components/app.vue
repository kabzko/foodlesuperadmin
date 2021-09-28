<template>
    <section>
        <div>
            <transition enter-active-class="animated fadeIn">
                <router-view></router-view>
            </transition>
        </div>
    </section>
</template>

<script>
export default {
    name: 'App'
}
</script>
