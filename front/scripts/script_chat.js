const messengerElement = document.querySelector('.messenger');
const headerHeight = getComputedStyle(document.documentElement).getPropertyValue('--header-height');
const headerBorderWidth = getComputedStyle(document.documentElement).getPropertyValue('--header-border-width');
const messengerHeight = `calc(100vh - (${headerHeight.trim()} + ${headerBorderWidth.trim()}))`;
messengerElement.style.height = messengerHeight;