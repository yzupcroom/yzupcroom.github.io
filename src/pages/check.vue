<template>
  <div class="q-pa-md">
    <div class="q-gutter-md" style="max-width: 300px">
      <q-form ref="form" greedy class="q-gutter-y-md" @keydown.enter.prevent >
        <q-select 
            v-model="admin" 
            label="請選取使用者" 
            :options="users" 
            option-label="AdminName" 
            option-value="AdminId"
            option-disable="inactive" 
            emit-value 
            map-options 
            />
        <q-btn-group outline>
          <q-btn color="black" outline label="上班" @click="onduty" />
          <q-btn color="black" outline label="下班" @click="offduty" />
          <q-btn color="black" outline label="打卡紀錄" @click="record" />
        </q-btn-group>
      </q-form>
      <q-btn outline label="click Me" @click="changeSignal" /> 
      <q-input v-if="check" outline label="check"></q-input> 
    </div>
  </div>
</template>



<script>
export default {
  data: () => ({
    name: "check",
    admin:'',
    check:{
      status : false,
    },
    users: []
  }),
  methods: {
   loadData () {

          this.users = data.value;
    },
    changeSignal(){
      this.check = !this.check;
      console.log(this.check);
    },
    getValue() {
      return {
        id:this.user.label,
        name:this.user.value
      }
    },
    onduty() {
      console.log("上班")
      // 接api -> Onduty.php
      // 打卡上班
      // reference : https://jeremysu0131.github.io/axios-%E8%99%95%E7%90%86-x-www-form-urlencoded-%E6%A0%BC%E5%BC%8F%E5%95%8F%E9%A1%8C/
      // prama = user.id
      this.record(); 
    },
    offduty() {
      console.log("下班")
      // 接api -> Offduty.php
      // 打卡下班
      // prama = user.id
      this.record()
    },
    record() {
      this.changeSignal();
      console.log("打卡紀錄")
      // 接api -> Log.php
      // show 出table 資料
      // prama = user.id
      this.changeSignal();
    }
  }
}

</script>
