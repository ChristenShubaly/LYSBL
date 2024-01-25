

# Project URL Configuration

from django.contrib import admin
from django.urls import path, include

urlpatterns = [

    path('', include('lysbl_api.urls')),
    
]


# urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
