﻿using Andreys.Services;

namespace Andreys.App
{
    using System.Collections.Generic;

    using Data;

    using SIS.MvcFramework;
    using SIS.HTTP;

    public class Startup : IMvcApplication
    {
        public void Configure(IList<Route> serverRoutingTable)
        {
            using (var db = new AndreysDbContext())
            {
                db.Database.EnsureCreated();
            }
        }

        public void ConfigureServices(IServiceCollection serviceCollection)
        {
            serviceCollection.Add<IUsersService, UsersService>();
            serviceCollection.Add<IProductsService, ProductsService>();
        }

        //Entities
        //DbContext
        //Connection string
        //Controllers
        //HomeController
        //UserController
        //Products
    }
}
