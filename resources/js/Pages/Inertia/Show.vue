<script setup>
  //Inertiaメソッドを使うのに必要
  import { Inertia  } from '@inertiajs/inertia';

  //コントローラから渡ってくる値を受け取る
  defineProps({
    id : String,
    //1件だけ取得する時はArrayではなくObject
    //Arrayにすると、Warningが発生
    blog: Object
  })

  //ボタンをクリックしたときの関数を作る(引数がid)
  const deleteConfirm = (id) => {

    //第一引数: 削除リクエストを送信する先のURL
    //第二引数: 省略されている
    //第三引数: イベントコールバックを返す
    Inertia.delete(`/inertia/${id}`, {
      onBefore: () => confirm('本当に削除しますか？')
    })
  }

</script>
<template>
  {{ id }}<br>
  {{ blog.title }}
  <!-- deleteConfirm関数は<script>タグで定義する -->
  <button @click="deleteConfirm(blog.id)">削除</button>
</template>