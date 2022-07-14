<template>
    <div class="q-gutter-md" style="max-width: 300px">
    <q-form ref="form" greedy class="q-gutter-y-md"  @keydown.enter.prevent >
      <q-select

        map-optionss
        label="選取使用者"
        :options="users"
      />
      <q-btn-group outline>
        <q-btn outline label="上班" @click="onduty" />
        <q-btn outline label="下班" @click="offduty" />
        <q-btn outline label="打卡紀錄" @click="record" />
      </q-btn-group>
    </q-form>
    </div>
</template>

<script>

export default {
  data: () => ({
    name: "check",
    info: {
      label: '',
      name: '',
    },
    users: [
      {
        label: "選取使用者",
        value: ""
      },
      {
        label: "Huan",
        value: "Huan"
      }

    ]
  }),
  methods: {
    getValue() {
      return {
        id:this.user.label,
        name:this.user.value
      }
    },
    onduty() {
      console.log("上班")
    },
    offduty() {
      console.log("下班")
    },
    record() {
      console.log("打卡紀錄")

    }
  }
}

</script>
