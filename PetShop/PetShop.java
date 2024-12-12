

import java.util.ArrayList;
import java.util.Iterator;


// class PetShop that contains an ArrayList of pets
public class PetShop {

     private ArrayList<Animal> animalList = new ArrayList<Animal>();
// method to add an animal to the ArrayList
   public void addAnimal(Animal animal) {
      this.animalList.add(animal);
   }
// method to remove an animal from the ArrayList
   public void removeAnimal(String nome) {
      Iterator<Animal> animal = this.animalList.iterator();

      Animal currentAnimal;
      do {
         if (!animal.hasNext()) {
            return;
         }

         currentAnimal = (Animal)animal.next();
      } while(!currentAnimal.getName().equalsIgnoreCase(nome));

      this.animalList.remove(currentAnimal);
   }
   // method to display the animals in the ArrayList
   public void showAnimal() {
        for (Animal animal : animalList) {
            System.out.println(animal.getDetails());
        }
    }
   // mmethod to search for an animal in the ArrayList

   public void searchAnimal (String name) {
      for (Animal animal : animalList) {
         if (animal.getName().equalsIgnoreCase(name)){
            System.out.println("Animal found:\n" + animal.getDetails());
         }
      }
      }


}
