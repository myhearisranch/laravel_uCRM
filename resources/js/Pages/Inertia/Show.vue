<script setup>
  //コントローラから渡ってくる値を受け取る
  defineProps({
    id : String
  })
</script>
<template>
  {{ id }}
</template>