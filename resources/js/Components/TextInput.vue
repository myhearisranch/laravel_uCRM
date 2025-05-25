<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

//update:modelValue: イベントの名前
defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <!-- $emit(カスタムイベント名, 渡したい値い値) -->
    <!-- $event.target.value: inputタグに入っているvalueのこと -->
    <!-- @input: 文字を入力したタイミングで発生する -->
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
