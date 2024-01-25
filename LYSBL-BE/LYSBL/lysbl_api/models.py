from django.db import models
# from django.contrib.auth.models import User
from django.contrib.auth.models import AbstractBaseUser, BaseUserManager


# User Manager
# Create a new user
# Create a new superuser
class UserManager(BaseUserManager):
    def create_user(self, email, username, password=None):
        if not email:
            raise ValueError("Users must have an email address")
        if not username:
            raise ValueError("Users must have a username")
        user = self.model(email=self.normalize_email(email), 
                          username=username,
                          )
        user.set_password(password)
        user.save(using=self._db)
        return user
    
    def create_superuser(self, email, username, password=None):
        user = self.model(email=self.normalize_email(email), 
                          username=username,
                          )
        user.is_admin = True
        user.is_staff = True
        user.is_superuser = True
        user.save(using=self._db)
        return user
                          
# Users
def get_profile_image_file_path(self, filename):
    return f'profile_img/{str(self.pk)}/{"profile_image.png"}'
def get_defualt_image_file_path():
    return 'profile-imgs/defualt_profile.png'

class account(AbstractBaseUser):
    email               = models.EmailField(verbose_name="email", max_length=60, unique=True)
    username            = models.CharField(verbose_name="username", max_length=60, unique=True)
    first_name          = models.CharField(verbose_name="first name", max_length=60)
    last_name           = models.CharField(verbose_name="last name", max_length=60)
    age                 = models.IntegerField(verbose_name="age", null=True, blank=True)
    sex                 = models.CharField(verbose_name="sex", max_length=60, null=True)
    phone_number        = models.CharField(verbose_name="phone number", max_length=60, null=True)
    date_joined         = models.DateTimeField(verbose_name="date joined", auto_now=True)
    last_login          = models.DateTimeField(verbose_name="last login", auto_now=True)
    is_admin            = models.BooleanField(default=False)
    is_active           = models.BooleanField(default=False)
    is_staff            = models.BooleanField(default=False)
    is_superuser        = models.BooleanField(default=False)
    profile_image       = models.ImageField(max_length=255, upload_to=get_profile_image_file_path, null=True, blank=True, default=get_defualt_image_file_path)
    hide_email          = models.BooleanField(default=True)
    
    objects = UserManager()
    
    class Meta:
        verbose_name = "account"
        verbose_name_plural = "account"
    
    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ['username']
    
    def __str__(self):
        return self.username
    
    def get_profile_image_filename(self):
        return str(self.profile_image)[str(self.profile_image).index(f'profile_img/{self.pk}/'):]
    
    def has_perm(self, perm, obj=None):
        return self.is_admin
    
    def module_perms(self, app_label):
        return True
    

# orders
class orders(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.ForeignKey(account, on_delete=models.CASCADE, related_name='user_orders')
    email = models.ForeignKey(account, on_delete=models.CASCADE, null=True, blank=True, related_name='email_orders')
    order_date = models.DateTimeField(auto_now_add=True)
    order_time = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        verbose_name = "order"
        verbose_name_plural = "orders"
   
    def __str__(self):
        return self.name

# products

class skincare(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "skincare"
        verbose_name_plural = "skincares"
    
    def __str__(self):
        return self.name

class nails(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "nail"
        verbose_name_plural = "nails"

    def __str__(self):
        return self.name
    
class lashes(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "lash"
        verbose_name_plural = "lashes"
    
    def __str__(self):
        return self.name

class brows(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "brow"
        verbose_name_plural = "brows"
    
    def __str__(self):
        return self.name

class wax(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "wax"
        verbose_name_plural = "waxes"
    
    def __str__(self):
        return self.name

class make_up(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    
    class Meta:
        verbose_name = "make_up"
        verbose_name_plural = "make_ups"
    
    def __str__(self):
        return self.name

class spray_tans(models.Model):
    name = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    details = models.CharField(max_length=500)
    
    class Meta:
        verbose_name = "spray_tan"
        verbose_name_plural = "spray_tans"
    
    def __str__(self):
        return self.name

class giftcards(models.Model):
    name = models.CharField(max_length=60)
    value = models.CharField(max_length=60)
    price = models.IntegerField(default=1000) # cents
    
    
    class Meta:
        verbose_name = "giftcard"
        verbose_name_plural = "giftcards"
    
    def __str__(self):
        return self.name