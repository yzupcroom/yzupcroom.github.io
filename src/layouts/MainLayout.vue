<template>
  <q-layout view="lHh lpR fff">
    <q-header
      class="bg-primary text-white"
      bordered
    >
      <q-toolbar class="q-px-lg">
        <q-toolbar-title class="q-pa-md">
          <q-icon name="computer" />
          薪水系統
        </q-toolbar-title>

        <q-separator
          dark
          vertical
        />
        <q-btn
          stretch
          flat
          label="打卡系統"
          :to="{ name: 'check' }"
        />
        <q-separator
          dark
          vertical
        />
        <q-btn
          stretch
          flat
          label="薪水查詢"
           :to="{ name: 'query' }"
        />
        <q-separator
          dark
          vertical
        />
        <q-btn
          stretch
          flat
          label="薪水計算"
          :to="{ name: 'calculate' }"
        />
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>



export default {
    name: 'Index',
    components: {

    },
    data: () => ({
    }),
    computed:{

    },
    async created () {
    },
    methods: {

    }
}
</script>
