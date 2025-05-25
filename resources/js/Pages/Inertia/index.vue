<script setup>
//Linkコンポーネントを使うのに必要
import { Link } from '@inertiajs/vue3'

//コントローラから変数を受け取るには、
//definePropsを書く必要がある
defineProps({
  blogs: Array
})
</script>
<template>
  <div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}
  </div>
  <ul>
    <li v-for="blog in blogs" :key="blog.id">
      件名:  <Link :href= "route('inertia.show', {id: blog.id})">{{ blog.title }}</Link>
      本文: {{ blog.content }}
    </li>
  </ul>
  <!-- ファイル名がindex.vueだと何も表示されず、
  遷移もしなかった -->
  ああああ
</template>