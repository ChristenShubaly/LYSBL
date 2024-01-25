

# application URL Configuration

from django.urls import path
from . import views
from django.urls import path
from django.contrib import admin

urlpatterns = [
    path('admin/', admin.site.urls, name='admin'),
    path('', views.root_view, name='root'),
    
    path('lysbl/', views.root_view, name='lysbl'),
    path('lysbl/index.html', views.root_view, name='section'), 
    
    path('return-to-store/', views.return_to_store, name='return_to_store'),
    
    path('cart/', views.cart_view, name='cart'),
    path('redirect-to-cart/', views.redirect_to_cart_view, name='redirect_to_cart'),
    
    
    path('create-checkout/', views.CheckoutSessionView.as_view(), name='Create_Checkout'),  # Use CheckoutSessionView
    # path('webhooks/stripe/', views.stripe_webhook, name='stripe_webhook'),
    # http://127.0.0.1:8000/webhooks/stripe/
    
    path('confirm-payment/', views.ConfirmPaymentView.as_view(), name='confirm_payment'),
    path('payment_success/', views.payment_success, name='payment_success'),
    path('payment_cancel/', views.payment_cancel, name='payment_cancel'),
    #test routes
    path('test-checkout/', views.test_checkout_page, name='test-checkout'),
    path('create-test-checkout-session/', views.CreateTestCheckoutSessionView.as_view(), name='create-test-checkout-session'),
    
    
]

