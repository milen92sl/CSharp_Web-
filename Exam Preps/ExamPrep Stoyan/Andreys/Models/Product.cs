﻿using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Text;

namespace Andreys.Models
{
    public class Product
    {
        public int Id { get; set; }

        [Required]
        public string Name { get; set; }
        [Required]
        public string Description { get; set; }
        [Required]
        public string ImageUrl { get; set; }
        public decimal Price { get; set; }
        public Category Category { get; set; }
        public Gender Gender { get; set; }
    }
}
//•	Has an Id – int, Primary key
//•	Has a Name – a string with min length 4 and max length 20 (inclusive) (required)
//•	Has a Description – a string with max length 10 (inclusive)
//•	Has a ImageUrl – a string
//•	Has a Price – a decimal (required)
//•	Has a Category – an Enum – option between (Shirt, Denim, Shorts, Jacket) (required) 
//•	Has a Gender – an Enum – option between (Male and Female) (required) 
//Implement the entities with the correct datatypes and their relations. 
