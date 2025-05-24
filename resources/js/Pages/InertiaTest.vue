<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const newTitle    = ref('')
const newContent  = ref('')

</script>

<template>
  Ineritaテストです<br>
  <a href="/">aタグ経由です</a><br>
  <Link href="/">Link経由です</Link><br>
  <Link :href="route('inertia.index')">名前付きルートの確認です</Link><br>
  <!-- 画面全体が表示されない -->
  <!-- <Link :href="route('inertia.show'), {id: 1}">ルートパラメータのテストです</Link> -->
  <Link :href="route('inertia.show', {id: 1})">ルートパラメータのテストです</Link>

  <div class="mb-8"></div>
  <!-- v-modeを使うことで連動して入力した値を変数に入れてくれる -->
  <!-- newTitle, newContentを使って、入力した値をリアルタイムに表示することもできる -->
  <input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}</input><br>
  <input type="text" name="newContent" v-model="newContent">{{ newContent }}</input><br>
  
  <!-- :data inputタグで入力した値をいれている -->
  <Link as="button" method = "post" :href="route('inertia.store')" 
    :data="{
      title: newTitle,
      content: newContent
    }">DB保存テスト</Link>
</template>