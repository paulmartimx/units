<template>
  <div class="app">
    <div class="container">
                <div class="card">
                    <div class="card-contents">
                        Testing Bulma.
                        <b-button type="is-primary" icon-left="check-circle">Testing Buefy</b-button>
                    </div>
                </div>
            </div>
  </div>
</template>

<script>
import { defineComponent } from '@vue/composition-api'
import AppMappers from '@/store/app-global-mappers'

export default defineComponent({
  name: 'App',
  mixins: [AppMappers],
})
</script>

<style lang="scss">
</style>
