const $gc_cash = document.getElementById('gc_cash')
const $gc_services = document.getElementById('gc_services')
const $gc_type = document.getElementById('gc-type')
const $cash = document.getElementById('cash')
const $voucher = document.getElementById('voucher')


const $gcCashContainer = document.querySelector('.gc-cash-container')
const $gcServicesContainer = document.querySelector('.gc-services-container')

if ($cash.checked) {
    $gcCashContainer.style.display = 'block'
    $gcServicesContainer.style.display = 'none'
} else {
    $gcCashContainer.style.display = 'none'
    $gcServicesContainer.style.display = 'block'
}

$gc_type.addEventListener('change', () => {
    if ($cash.checked) {
        $gcCashContainer.style.display = 'block'
        $gcServicesContainer.style.display = 'none'
    } else {
        $gcCashContainer.style.display = 'none'
        $gcServicesContainer.style.display = 'block'
    }
})