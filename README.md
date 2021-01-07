# Electrodeal

WareDeal is an e-commerce application, where the customers are able order electronic hardware.
Inspired By: Logitech website (https://www.logitech.com/id-id/mice)

1.  Features:

    - The Customer able to order the item
    - The Customer able to pin point the location on the map
    - The Customer able to personalize their account, example: change profile picture, change password, etc.
    - The Admin able to add, edit, or delete item in the website
    - The Admin able to see statistic, purchased history
    - The Admin able to see all the pin pointed extraction point and able to click and see the detail of order
    - The Admin able to generate report file of the transaction in the past

2.  Technology used:

    - Leaflet https://leafletjs.com/reference-1.6.0.html -> Javascript library for interactive map
    - MapTiler https://cloud.maptiler.com/maps/streets/ -> Mapping platform designed for quick publishing of zoomable maps online for web applications, mobile devices and 3D visualisations.
    - PHPMailer https://github.com/PHPMailer/PHPMailer -> Email Confirmation
    - Telegram Bot https://core.telegram.org/bots/api -> Telegram Confirmation

3.  Tables:

    ```
      ed_auth:
      - auth_username
      - auth_password

      ed_brands
      - brand_Id
      - brand_Name

      ed_Items
      - Item_id
      - item_name
      - item_desc
      - item_price
      - item_in_hand
      - item_sold
      - item_pic
      - item_trend
      - item_capt
      - item_bg_color
      - item_brand_id
      - item_type_id

      ed_orders
      - order_id
      - order_username
      - order_email
      - order_phone_number
      - order_item_id
      - order_date
      - order_amount
      - order_total_price
      - order_address
      - order_geo_lat
      - order_geo_lon
      - order_message

      ed_trans
      - trans_id
      - trans_order_id
      - trans_order_username
      - trans_order_email
      - trans_order_phone_number
      - trans_order_item_id
      - trans_order_date
      - trans_order_amount
      - trans_order_total_price
      - trans_order_address
      - trans_order_geo_lat
      - trans_order_geo_lon
      - trans_order_message
      - trans_date

      ed_types
      - type_id
      - type_name

      ed_customer
      - customer_username
      - customer_name

      ed_cart
      - cart_id
      - cart_item_id
      - cart_customer_id
    ```

4.  Flow:
    ed_auth: - auth_username - auth_password

        ed_brands
        - brand_Id
        - brand_Name

        ed_Items
        - Item_id
        - item_name
        - item_desc
        - item_price
        - item_in_hand
        - item_sold
        - item_pic
        - item_trend
        - item_capt
        - item_bg_color
        - item_brand_id
        - item_type_id

        ed_orders
        - order_id
        - order_username
        - order_email
        - order_phone_number
        - order_item_id
        - order_date
        - order_amount
        - order_total_price
        - order_address
        - order_geo_lat
        - order_geo_lon
        - order_message

        ed_trans
        - trans_id
        - trans_order_id
        - trans_order_username
        - trans_order_email
        - trans_order_phone_number
        - trans_order_item_id
        - trans_order_date
        - trans_order_amount
        - trans_order_total_price
        - trans_order_address
        - trans_order_geo_lat
        - trans_order_geo_lon
        - trans_order_message
        - trans_date

        ed_types
        - type_id
        - type_name

        ed_customer
        - customer_username
        - customer_name

        ed_cart
        - cart_id
        - cart_item_id
        - cart_customer_id

5.  Flow:
    Customer -> Website -> Item List -> Order Now -> Form -> Get Confirmation Email

---

## Admin

![image](https://lh6.googleusercontent.com/dhQH5x_FltQ6Pm6SSf62ns80aXBlfQQb2P22JrTtucqhPbA_5Gn_38nZ_S37i-qn4Npcn6pqmdBbx02ksomSFeBvlR2-fcblIkJTonu2p7MHKS94OkFAF5zoIC7Vse-LF_uo77hryA)

In order to access the admin site, you have to login first.

![image](https://lh6.googleusercontent.com/HMQWvBlUDfVPNHROaHk_76TCIrxZDzY4IvmgZLQEUEp3OI9BAkIzQduXvAhXz4O67lqm5PjwWRb1gdLn2EBSj6N1NscWOcRq7Xgn-gWhi8njSFRPjR2srgHLy6r04OZ_8oCcHqqumQ)

In admin site, you can see a couple page, the first page is the Orders page, in Order page, you can see the visualization of all the order you got. You will see a map that pin point to the order location.

![image](https://lh4.googleusercontent.com/NamEs_8IikdsQlkwc8-o5TFm-CS4lfQcDkTSLrfeBeWCCvqg_x7Yvdkf_HnLZJlEYZoGOWxMDJ74bAbV9Li-2sNbkg3mJXYdSZuw_NNQYc5A-FTl0nTPz0mTFO27oaoB3Eo8HlLutQ)

In Order page, you can also the list of detail of all the order you've got.

![image](https://lh4.googleusercontent.com/YiWllsus0Oyg-G701pmo-s7KRFpdz4SRtEXVEOcx34taCu-Z38xbM7rfra2iq4mzOEB7Bd19qmH2OLZ5VSXxBqggHfmFD6wVYrMRskZBQOn-uE6L6GHot1ZoiwS1p0APKAXdUqcaZQ)

This is the Inventory page, it contains all the item information that you have.

![image](https://lh6.googleusercontent.com/NK1tEwIVN6N0-d7OLgKY3gRrGj6Vvdg7co6b2qxDo9p9UAYIEXCLxX9GHb1EDi02ocolM6Z3upinxBriLUATIqK5FyI0Lnlxo7Z-EfgThErve_rrpI7rld97ICJ84Mudp0xj_SKFvw)

This is the Transaction page, it contains the history of all your transaction in the past.

![image](https://lh4.googleusercontent.com/ThY8WqRuUWANkslu4e-aUYYLUfVNH14vCN1F7SjTpOZ5G9r3VUDLZT89TrsLKml3DtXHDguDxwLo3mC8D-4QS-C_3AVotHuL4MLMWJnKuCzWXFxC-2nH3SED1DM6_JbRc6ZHPdwijA)

This is the Statistic page, it contains the visual representation of all the sold item. So you can see which item is the most popular.

![image](https://lh4.googleusercontent.com/nXE_MVzKUV_cOFNKgZmB2XfhvZo8Ji2VhMUN22DUrAog1rvLpwI_EW3JY-zmseZtGsMHOdlDtwzs2xZhvKgZe3GjukLPJlCdbtnbK-aglaxXv8ENioCC2fVsc_c7lsRSXaxyko4C7w)

This is the Customer page, it contains the list of customer account information that already registered to your database.

![image](https://lh4.googleusercontent.com/anwtEG3rNOg1Qx5I1xnYk3dkhosUG5kXX_rDcCpqvqgUIvzhNcHrTO_410D3k_Mul1MR8Job9gSWCDMq_H4cp_Z2kVOcazlblO4dOyGiR0f7bUu1R-V7U5u2CDHaIDQaFPClRzmAJg)

This is the Report page, as the admin you able to generate all the transaction histories to the txt file. You can also load the report in there.

---

## Client

![image](https://lh4.googleusercontent.com/8Lm5uy1sXRSgTVHyCAhv43EjQf604QDIftwVxGxdQYspQ9ZgxnNI068RGuuYt5KxCY0Po2_ZeNcQmyp6HXs_gcqxIgFQ4GybMObPoIU3GPxa_DE-UvJt41x8nJ5k-VWusKNwQ62cbA)

To order an item as the customer, first you have to login as the customer.

![image](https://lh4.googleusercontent.com/NXbHSrbFjNhqsLDx0vihTYVrG1VFUscKdILtmuiptyqX__l8jQtWm0883ALBZGIGvQ5tuLgsPJdy62pAfphAqwYmYJHMBiGqLd8EkTRoCwPLSMW0SL5EzyqTamwHEhuMBitXIocIFw)

If you dont have an account, you can register a new account for yourself.

![image](https://lh6.googleusercontent.com/PeWQrs4fFSjKQCmWQJuCn_t1Pfn99aPXW1NLEd8w3yCVqyxT4euyn2wufBQkNrqxuyngiQpFt7hm44lOw26YmpudhOkY0UX4jgAcrDIJVFj2Z7W6yZFA4dnWYq-QufDqD6JUytRjnQ)

In Index/Home page, you will see the list of item that you can order.

![image](https://lh6.googleusercontent.com/35DVhAMHDiwdtm9q8itaR3uWTVV7crn02c2f0vTujVzIkjsUXsRKdYXU78n5BI__YKXfw0-zupQ65VHAPR2hMm6RnlYnySgiahWjmMIJVnJUriV4uD8Knvm1Zg8_Q4ubaXQrWW7gmw)

You can change you profile picture and you password, and you can also see all items in your cart.

![image](https://lh5.googleusercontent.com/xA7Qg7Tbc_83eAoOP9hQSo6Y9mCFKzFhfIKfux8b15dHs2lo-l2167YxKxlFUPeixu5ld4uiHVDf6TRPUg_HpLX6KBUoPY_GslqJaUrQG605Is1AvtYeoHAbzaYx6L5ykNYWyKkdkg)

If you click an item, you will see the details of that item. You can order, or you can add that item to your cart.

![image](https://lh3.googleusercontent.com/-16BUP1ET_GpgyJpfkiFakDhxXqC5hYOGUKxI8WnDibuqiNbnxQ6mcIA3KxNDabkdI9wXW-PZNA7UTCR0u8zK8d_YiaZq7xYs_EKCpObcMwi78oM2rg-9w6ShjKquO5L9lMHuL-Jqw)

If you click order, you will get this form that you have to fill in.

![image](https://lh3.googleusercontent.com/_jLCtQLH3O_rBytHxEp-l40X4LfUfk8l2pwEzO7XRBAPgw8drx7jkjedQNoitEbjaEfeNof-pKRQz0ymm2p34_pxqpaVTR6lUlS2jC_Pwu8Ilx1hgeyDlldytaQKQLF1jkFhzjS5Fg)

You can pin point your location for the detail of your address, or you can leave it empty.

![image](https://lh3.googleusercontent.com/pZU2hykOKBc7WJP8FcVZXEx0i6WQFbiYZ7rCsVGmqn8qrBPwqnnCOU3Ct2pX6KxujZPGf_Y_-xTkDC8D3olEPH4bvEmwXCY5jkYBSJs3aZkgVcpcw7zGT5eX7Ui7Z3Ndnp91DERnrQ)

After the form has filled in, you can click the proceed button.

![image](https://lh4.googleusercontent.com/yEOoravLKLZPVcxSRaWl_AletgabTejtl7N9rzvNaLFYm9634NX-IqnF1v1nYFMIHP8jPIBaug-dmr-XweqrcBxs9ghafUd_Jaz09p7Na5JyFUuI7NrsBD-OvVYsdjy1lZagckw13w)

In a few second, you will get a notification, that the data has inserted to the database successfully.

![image](https://lh6.googleusercontent.com/fi0lOt511MaNp0qzHymF1LH6RTLOySr_Y2M0GD3klbxKyhZwMmqMygqZqGyYUwc0UCmKfs7KMvgfFHl4pH76LwNg_YBj3iTm85M5iuw4a-x5un8DrP0jIkcxnkFVkipFnfkHdW7j9w)

You will get the confirmation email, that notifies you that the order has been processed.

![image](https://lh6.googleusercontent.com/zKhZF6A71RSwUDPEKVK2jeNtErnzzb5GOoDFUMBF1jt1e29zDqfbnDG7OG7FqXGN9P_72FnaFiURq8GbDTDiTn8qaiYEe8FHeSWMowIYfSj2SXeeYnGkl2NLYXXnejgHumVhMkTIEw)

You will also get the telegram notification of the order details.

### Sources

    - File Uploading:
    	- https://www.youtube.com/watch?v=JaRq73y5MJk

    - Php:
    	- https://www.php.net/docs.php

    - Mysqli:
    	- https://www.php.net/manual/en/book.mysqli.php

    - Session:
    	- https://www.w3schools.com/php/php_sessions.asp

    - Php date:
    	- https://www.php.net/manual/en/function.date.php

    - Shell Command:
    	- https://www.youtube.com/watch?v=sGUwVycezTs
    	- https://www.youtube.com/watch?v=0hFLKIWuvgc

    - Bot Telegram:
    	- https://core.telegram.org/bots/api
    	- https://www.wadagizig.com/2018/01/membuat-form-telegram-bot-php.html
    	- https://www.youtube.com/watch?v=BEYG-tjQbrE&t=179s
    	- https://www.youtube.com/watch?v=2AxK5nhMOy0

    - Leaflet:
    	- https://leafletjs.com/reference-1.6.0.html
    	- https://www.youtube.com/watch?v=wVnimcQsuwk
    	- https://www.youtube.com/watch?v=OYjFR_CGV8o&t=25s

    - MapTiler:
    	- https://cloud.maptiler.com/maps/streets/

    - PHPMailer:
    	- https://github.com/PHPMailer/PHPMailer
    	- https://www.youtube.com/watch?v=QUWDC1ZjMHA&t=20s
