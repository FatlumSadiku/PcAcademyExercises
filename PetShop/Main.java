
import java.util.Scanner;
import java.util.InputMismatchException;


public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
      // create an object of the PetShop class
      PetShop petShop = new PetShop();

      int choice; // variable to store the user's choice

      do {
         System.out.println("\nMenu:");
         System.out.println("1. Show animals");
         System.out.println("2. Search animals");
         System.out.println("3. Add Dog");
         System.out.println("4. Add Cat");
         System.out.println("5. Remove animal");
         System.out.println("0. Leave");
         System.out.print("Choice: ");

         try {
            choice = scanner.nextInt();
            switch (choice) {
               case 0:
                  System.out.println("See you soon");
                  break;
               case 1:
                  System.out.println("\nAnimal list:");
                  petShop.showAnimal();
                  break;
               case 2:
                  System.out.print("\nWrite the name of the animal you're looking for: ");
                  String animalName = scanner.next();
                  petShop.searchAnimal(animalName);
                  break;
               case 3:
                  scanner.nextLine();
                  System.out.println("Name:");
                  String dogName = scanner.nextLine();
                  System.out.println("Species:");
                  String dogSpecies = scanner.nextLine();
                  System.out.println("Race:");
                  String dogRace = scanner.nextLine();
                  System.out.println("Età:");
                  int dogAge = scanner.nextInt();
                  petShop.addAnimal(new Dog(dogName, dogSpecies, dogAge, dogRace));
                  System.out.println("Dog has been added to the pet shop.");
                  break;
               case 4:
                  scanner.nextLine();
                  System.out.println("Name:");
                  String catName = scanner.nextLine();
                  System.out.println("Species:");
                  String catSpecies = scanner.nextLine();
                  System.out.println("Fur color:");
                  String catFurColor = scanner.nextLine();
                  System.out.println("Age");
                  int catAge = scanner.nextInt();
                  petShop.addAnimal(new Cat(catName, catSpecies, catAge, catFurColor));
                  System.out.println("Cat has been added to the pet shop");
                  break;
               case 5:
                  System.out.print("\nWrite the name of the animal you wish to delete from the pet shop: ");
                  scanner.nextLine();
                  String nameToDelete = scanner.next();
                  petShop.removeAnimal(nameToDelete);
                  System.out.println("Animal has been removed");
                  break;
               default:
                  System.out.println("Invalid choice");
            }
         } catch (InputMismatchException E) {
            System.out.println("Input error. Please insert a valid number.");
            scanner.next();
            choice = -1;
         }
      } while(choice != 0);

      scanner.close();

    }

}
