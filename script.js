// This function is to count the characters and limit it to 150 characters
document.getElementById('content').addEventListener('input', function () {
  let content = this.value.trim();
  let charCount = content.length;
  let currentCount = document.getElementById('current_count');
  let maximumCount = document.getElementById('maximum_count');
  
  if (charCount > 150) {
    // Trim the content to 150 characters
    content = content.slice(0, 150);
    this.value = content;
    charCount = 150;
  }

  currentCount.textContent = charCount;
});