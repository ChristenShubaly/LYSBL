from django.shortcuts import render
from django.shortcuts import get_object_or_404
from django.http import JsonResponse, HttpResponse
from django.urls import reverse
from django.shortcuts import redirect
from django.views import View
from django.utils.decorators import method_decorator
from django.views.decorators.csrf import csrf_exempt
import requests
import json
from django.conf import settings
import logging
import json
from json.decoder import JSONDecodeError

from .models import skincare, nails, lashes, brows, wax, make_up, spray_tans, giftcards

#stripe
import stripe

from django.conf import settings
stripe.api_key = settings.STRIPE_SECRET_KEY

logger = logging.getLogger(__name__)

def root_view(request):
    skincare_model = skincare.objects.all()
    nails_model = list(nails.objects.all())[:-3]
    lashes_model = list(lashes.objects.all())[:-2]
    brows_model = brows.objects.all()
    wax_model = wax.objects.all()
    make_up_model = make_up.objects.all()
    spray_tans_model = spray_tans.objects.all()
    giftcards_model = giftcards.objects.all()
    
    price_range = range(25, 201, 25)
    
    context = {
        'skincare_model': skincare_model,
        'nails_model': nails_model,
        'lashes_model': lashes_model,
        'brows_model': brows_model,
        'wax_model': wax_model,
        'make_up_model': make_up_model,
        'spray_tans_model': spray_tans_model,
        'giftcards_model': giftcards_model,
        'price_range': price_range
    }
    
    return render(request, 'index.html', context)


def cart_view(request):
    return render(request, 'cart.html', {})

# stripe checkout
logger = logging.getLogger(__name__)

# @method_decorator(csrf_exempt, name='dispatch')
# class CheckoutSessionView(View):
#     def post(self, request):
#         logger.info("CheckoutSessionView POST request received")
        
#         # Log the raw request body
#         logger.debug(f"Raw POST data: {request.body}")
#     #  Load data from the POST request
    
#         if not request.body:
#             logger.error("Empty request body")
#             return JsonResponse({'error': 'Empty request body'}, status=400)

    
#         try:
            
#             data = json.loads(request.body.decode('utf-8'))
#             logger.debug(f"Decoded JSON data: {data}")
           
            
#             cart_items = data.get('cartItems', [])

#             stripe.api_key = settings.STRIPE_SECRET_KEY  

#             stripe_items = []
#             for item in cart_items:
#                 if item['gc-type'] == 'cash':
#                     # Assuming 'gc-cash' holds the amount for the cash gift card
#                     amount = int(item['gc-cash']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': 'Cash Gift Card'},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })
#                 elif item['gc-type'] == 'voucher':
#                     # Assuming 'gc-price' holds the price for the voucher
#                     amount = int(item['gc-price']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': f"Voucher for {item['gc-service']}"},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })

#             if not stripe_items:
#                 return JsonResponse({'error': 'No valid items in cart'}, status=400)

#             # Create the Stripe checkout session
#             checkout_session = stripe.checkout.Session.create(
#                 payment_method_types=['card'],
#                 line_items=stripe_items,
#                 mode='payment',
#                 success_url=request.build_absolute_uri('/payment_success/'),
#                 cancel_url=request.build_absolute_uri('/payment_cancel/'),
#             )

#             return JsonResponse({'sessionId': checkout_session.id})
#         except JSONDecodeError as e:
#             logger.error(f"JSON Decoding Error: {str(e)}")
#             return JsonResponse({'error': 'Invalid JSON format'}, status=400)
#         except Exception as e:
#             logger.error(f"Unexpected Error: {str(e)}")
#             return JsonResponse({'error': str(e)}, status=500)   
            
#lets simplify this down
@method_decorator(csrf_exempt, name='dispatch')
class CheckoutSessionView(View):
    def post(self, request):
        logger.info("Raw request body: " + str(request.body))
        try:
            logger.info("Raw request body: " + str(request.body))
            data = json.loads(request.body.decode('utf-8'))
            
            if not request.body:
                return JsonResponse({'error': 'Empty request body'}, status=400)
            
            cart_items = data.get('cartItems', [])
            stripe_items = []
            for item in cart_items:
                if item['gc-type'] == 'cash':
                    # Assuming 'gc-cash' holds the amount for the cash gift card
                    amount = int(item['gc-cash']) * 100  # Convert dollars to cents
                    stripe_items.append({
                        'price_data': {
                            'currency': 'cad',
                            'product_data': {'name': 'Cash Gift Card'},
                            'unit_amount': amount,
                        },
                        'quantity': 1,
                    })
                elif item['gc-type'] == 'voucher':
                    # Assuming 'gc-price' holds the price for the voucher
                    amount = int(item['gc-price']) * 100  # Convert dollars to cents
                    stripe_items.append({
                        'price_data': {
                            'currency': 'cad',
                            'product_data': {'name': f"Voucher for {item['gc-service']}"},
                            'unit_amount': amount,
                        },
                        'quantity': 1,
                    })

            
            
            checkout_session = stripe.checkout.Session.create(
                payment_method_types=['card'],
                line_items=stripe_items,
                mode='payment',
                success_url=request.build_absolute_uri('/payment_success/'),
                cancel_url=request.build_absolute_uri('/payment_cancel/')
            )

            return JsonResponse({'url': checkout_session.url})

        except json.JSONDecodeError as e:
            return JsonResponse({'error': f'Invalid JSON: {str(e)}'}, status=400)
        except Exception as e:
            return JsonResponse({'error': str(e)}, status=500)



# @method_decorator(csrf_exempt, name='dispatch')
# class CheckoutSessionView(View):
#     def post(self, request):
#     #  Load data from the POST request
#         if request.body:
#             data = json.loads(request.body.decode('utf-8'))
#             cart_items = data.get('cartItems', [])

#             stripe.api_key = settings.STRIPE_SECRET_KEY  

#             stripe_items = []
#             for item in cart_items:
#                 if item['gc-type'] == 'cash':
#                     # Assuming 'gc-cash' holds the amount for the cash gift card
#                     amount = int(item['gc-cash']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': 'Cash Gift Card'},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })
#                 elif item['gc-type'] == 'voucher':
#                     # Assuming 'gc-price' holds the price for the voucher
#                     amount = int(item['gc-price']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': f"Voucher for {item['gc-service']}"},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })

#             if not stripe_items:
#                 return JsonResponse({'error': 'No valid items in cart'}, status=400)

#             # Create the Stripe checkout session
#             try:
#                 checkout_session = stripe.checkout.Session.create(
#                     payment_method_types=['card'],
#                     line_items=stripe_items,
#                     mode='payment',
#                     success_url=request.build_absolute_uri('/payment_success/'),
#                     cancel_url=request.build_absolute_uri('/payment_cancel/'),
#                 )
#                 print(checkout_session.url)
#                 print('\n')
#                 print(checkout_session.id)
#                 print('\n')
#                 print(stripe_items)
#                 print('\n')
#                 print('fullJSON', checkout_session)
#                 print('\n ......')
                
#                 # return redirect(checkout_session.url, code=303)
#                 return JsonResponse({'url': checkout_session.url})
#                 # return JsonResponse({'sessionId': checkout_session.id})
#                 # return JsonResponse({'url': checkout_session.url})
            
#             except Exception as e:
#                 return JsonResponse({'error': str(e)}, status=500)

# class CheckoutSessionView(View):
#     @csrf_exempt
#     def post(self, request):
#         # Load data from the POST request
#         if request.body:
#             data = json.loads(request.body.decode('utf-8'))
#             cart_items = data.get('cartItems', [])

#             stripe.api_key = settings.STRIPE_SECRET_KEY  

#             stripe_items = []
#             for item in cart_items:
#                 if item['gc-type'] == 'cash':
#                     # Assuming 'gc-cash' holds the amount for the cash gift card
#                     amount = int(item['gc-cash']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': 'Cash Gift Card'},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })
#                 elif item['gc-type'] == 'voucher':
#                     # Assuming 'gc-price' holds the price for the voucher
#                     amount = int(item['gc-price']) * 100  # Convert dollars to cents
#                     stripe_items.append({
#                         'price_data': {
#                             'currency': 'cad',
#                             'product_data': {'name': f"Voucher for {item['gc-service']}"},
#                             'unit_amount': amount,
#                         },
#                         'quantity': 1,
#                     })

#             if not stripe_items:
#                 return JsonResponse({'error': 'No valid items in cart'}, status=400)

#             # Create the Stripe checkout session
#             try:
#                 checkout_session = stripe.checkout.Session.create(
#                     payment_method_types=['card'],
#                     line_items=stripe_items,
#                     mode='payment',
#                     success_url=request.build_absolute_uri('/payment_success/'),
#                     cancel_url=request.build_absolute_uri('/payment_cancel/'),
#                 )
#                 print(checkout_session.url)
#                 print('\n')
#                 print(checkout_session.id)
#                 print('\n')
#                 print(stripe_items)
#                 print('\n')
#                 print('fullJSON', checkout_session)
#                 print('\n ......')
                
#                 # return redirect(checkout_session.url, code=303)
#                 return JsonResponse({'sessionId': checkout_session.id})
#                 # return JsonResponse({'url': checkout_session.url})
            
#             except Exception as e:
#                 return JsonResponse({'error': str(e)}, status=500)



    


# I'm testing the checkout session in hard code
# Test block
def test_checkout_page(request):
    return render(request, 'test.html')

class CreateTestCheckoutSessionView(View):
    def get(self, request):
        try:
            # Create a new Stripe Checkout Session for a test product
            checkout_session = stripe.checkout.Session.create(
                payment_method_types=['card'],
                line_items=[{
                    'price_data': {
                        'currency': 'usd',
                        'product_data': {
                            'name': 'Test Product',
                        },
                        'unit_amount': 2000,  # $20.00
                    },
                    'quantity': 1,
                }],
                mode='payment',
                success_url=request.build_absolute_uri('/payment_success/'),
                cancel_url=request.build_absolute_uri('/payment_cancel/'),
            )
            return JsonResponse({'sessionId': checkout_session.id})
        except Exception as e:
            return JsonResponse({'error': str(e)}, status=500)
# End test block

class ConfirmPaymentView(View):
    @csrf_exempt
    def post(self, request, *args, **kwargs):
        payload = request.body.decode('utf-8')
        sig_header = request.META['HTTP_STRIPE_SIGNATURE']
        endpoint_secret = settings.STRIPE_ENDPOINT_SECRET

        try:
            event = stripe.Webhook.construct_event(
                payload, sig_header, endpoint_secret
            )
        except ValueError as e:
            # Invalid payload
            return HttpResponse(status=400)
        except stripe.error.SignatureVerificationError as e:
            # Invalid signature
            return HttpResponse(status=400)

        # Handle the event
        if event['type'] == 'checkout.session.completed':
            # Payment was successful, update your database or handle other logic
            handle_payment_success(event['data']['object'])

        return JsonResponse({'status': 'success'})

def payment_success(request):
    return render(request, 'payment_success.html')

def payment_cancel(request):
    return render(request, 'payment_cancel.html')

def handle_payment_success(session):
    # Placeholder function, replace with your logic
    print(f"Payment succeeded for session: {session['id']}")
    # Example: Update your database, send confirmation email, etc.
    # Implement the actions you want to take when a payment is successful.

# Redirections

def return_to_store(request):
    store_url = reverse('lysbl')
    return redirect(store_url) 

def redirect_to_cart_view(request):
    cart_url = reverse('cart')  
    return redirect(cart_url)




