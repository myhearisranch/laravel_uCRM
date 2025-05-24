<script setup>
import { reactive } from 'vue';
import { Inertia  } from '@inertiajs/inertia';

//バリデーションエラーが発生した時に
//Inertia.jsによって自動的にフロントエンドのVueコンポーネントに渡される
defineProps({
  errors: Object
})

//inputタグに値を入れるとリアルタイムで
//title, contentの値が変わる
//nullは初期値
const form = reactive({
  title: null,
  content: null
})

//フォームを入力した時の処理を書く
const submitFunction = () => {
  //第一引数: フォームの値を渡すURL, 第二引数: 渡す値(const Form~で定義している)
  Inertia.post('/inertia', form)
}

</script>

<template>
  <!-- prevent: @submitした時にページ全体が読み込魔れるのを防ぐ -->
  <!-- submitFunction: <script>タグで定義したフォームを入力した時の処理を書いている -->
  <form @submit.prevent="submitFunction">
    <input type ="text" name="title" v-model="form.title"><br>
    <div v-if="errors.title">{{ errors.title }}</div>
    <!-- contentの入力フォームが表示されない -->
    <!-- <button>送信</button>を消しても、送信ボタンが表示されたまま->コードの変更が反映されていないのでは？ -->
    <!-- フロントエンドのビルドコマンドを再実行: npm run dev -->
    <input type = "text"name="content" v-model="form.content"><br>
    <div v-if="errors.content">{{ errors.content }}</div>
    <button>送信</button>
  </form>
</template>