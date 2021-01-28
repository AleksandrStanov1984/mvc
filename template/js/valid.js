function handleChange(input) {
    if (input.value < 0) input.value = 0;
    if (input.value > 10) input.value = 10;
}